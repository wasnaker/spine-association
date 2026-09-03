<?php

declare(strict_types=1);

namespace Modules\Association\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Association\Models\Association;
use Spine\Services\ActivityLogService;

/**
 * CRUD Association — modul Association (DPW RUI per provinsi).
 *
 * Field business:
 *   - code          (unique)
 *   - name          (mis. "DPW RUI DKI Jakarta")
 *   - province_id   (FK provinces, UNIQUE — 1 asosiasi per provinsi)
 *   - regency_id    (FK regencies, nullable — kota domisili)
 *   - admin_id      (FK users — 1 admin per asosiasi)
 *   - is_active     (boolean)
 *
 * Activity log OTOMATIS via EntityCreated/Updated/Deleted (HasLifecycleHooks)
 * -> listener LogAssociationActivity di ServiceProvider.
 */
class AssociationController extends Controller
{
    public function __construct(
        private readonly ActivityLogService $activityLog,
    ) {
    }

    public function index(Request $request): JsonResponse
    {
        $query = Association::with(['province:id,code,name', 'regency:id,name', 'admin:id,name']);

        if ($request->filled('q')) {
            $term = $request->string('q');
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('code', 'like', "%{$term}%");
            });
        }
        if ($request->has('is_active')) {
            $query->where('is_active', filter_var($request->query('is_active'), FILTER_VALIDATE_BOOLEAN));
        }

        return response()->json(['data' => $query->orderBy('name')->get()]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code'        => ['required', 'string', 'max:64'],
            'name'        => ['required', 'string', 'max:190'],
            'address'     => ['nullable', 'string', 'max:1024'],
            'province_id' => ['required', 'integer', 'exists:provinces,id'],
            'regency_id'  => ['nullable', 'integer', 'exists:regencies,id'],
            'admin_id'    => ['nullable', 'integer', 'exists:users,id'],
            'is_active'   => ['sometimes', 'boolean'],
        ]);

        if (Association::where('code', $validated['code'])->exists()) {
            return response()->json(['message' => "Code {$validated['code']} sudah ada."], 422);
        }
        if (Association::where('province_id', $validated['province_id'])->exists()) {
            return response()->json(['message' => 'Provinsi ini sudah memiliki association.'], 422);
        }

        $entity = Association::create($validated);

        return response()->json($entity, 201);
    }

    public function show(int $id): JsonResponse
    {
        $entity = Association::with(['province:id,code,name', 'regency:id,name', 'admin:id,name'])->find($id);

        if (! $entity) {
            return response()->json(['message' => 'Association not found'], 404);
        }

        return response()->json($entity);
    }

    public function update(int $id, Request $request): JsonResponse
    {
        $entity = Association::find($id);

        if (! $entity) {
            return response()->json(['message' => 'Association not found'], 404);
        }

        $validated = $request->validate([
            'code'        => ['sometimes', 'string', 'max:64'],
            'name'        => ['sometimes', 'string', 'max:190'],
            'address'     => ['nullable', 'string', 'max:1024'],
            'province_id' => ['sometimes', 'integer', 'exists:provinces,id'],
            'regency_id'  => ['nullable', 'integer', 'exists:regencies,id'],
            'admin_id'    => ['nullable', 'integer', 'exists:users,id'],
            'is_active'   => ['sometimes', 'boolean'],
        ]);

        if (isset($validated['code']) && Association::where('code', $validated['code'])->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => "Code {$validated['code']} sudah dipakai association lain."], 422);
        }
        if (isset($validated['province_id']) && Association::where('province_id', $validated['province_id'])->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'Provinsi ini sudah memiliki association lain.'], 422);
        }

        $entity->update($validated);

        return response()->json($entity);
    }

    public function destroy(int $id): JsonResponse
    {
        $entity = Association::find($id);

        if (! $entity) {
            return response()->json(['message' => 'Association not found'], 404);
        }

        $entity->delete();

        return response()->json(['message' => 'Association deleted']);
    }

    public function activityLogs(int $id): JsonResponse
    {
        if (! Association::find($id)) {
            return response()->json(['message' => 'Association not found'], 404);
        }

        $logs = $this->activityLog
            ->query()
            ->where('subject_type', Association::class)
            ->where('subject_id', $id)
            ->orderByDesc('created_at')
            ->get()
            ->map(fn ($log) => [
                'id'          => $log->id,
                'description' => $log->description,
                'causer'      => $log->causer?->name ?? 'System',
                'properties'  => $log->properties,
                'at'          => $log->created_at?->toIso8601String(),
            ]);

        return response()->json(['data' => $logs]);
    }
}
