<?php

declare(strict_types=1);

namespace Modules\Association\Listeners;

use Modules\Association\Models\Association;
use Spine\Events\EntityCreated;
use Spine\Events\EntityDeleted;
use Spine\Events\EntityUpdated;
use Spine\Services\ActivityLogService;

/**
 * HOOK — entity lifecycle generic (HasLifecycleHooks) untuk Association.
 * created/updated/deleted -> activity log (satu listener, semua entity).
 */
class LogAssociationActivity
{
    public function __construct(private readonly ActivityLogService $activityLog)
    {
    }

    public function created(EntityCreated $event): void
    {
        if (! $event->entity instanceof Association) {
            return;
        }

        $this->activityLog->log(
            "Association created: " . $this->label($event->entity),
            $event->entity,
            $this->user(),
            ['event' => 'created'],
        );
    }

    public function updated(EntityUpdated $event): void
    {
        if (! $event->entity instanceof Association) {
            return;
        }

        $changes = $event->changes;

        $this->activityLog->log(
            "Association updated: " . $this->label($event->entity) . " (" . $this->describe($changes) . ")",
            $event->entity,
            $this->user(),
            ['event' => 'updated', 'changes' => $changes],
        );

        $status = $changes['is_active'] ?? null;
        if ($status && $status['old'] !== $status['new']) {
            $this->activityLog->log(
                "Association status changed: " . $this->boolLabel($status['old']) . " -> " . $this->boolLabel($status['new']),
                $event->entity,
                $this->user(),
                ['event' => 'association.status_changed', 'old' => $status['old'], 'new' => $status['new']],
            );
        }
    }

    public function deleted(EntityDeleted $event): void
    {
        if (! $event->entity instanceof Association) {
            return;
        }

        $this->activityLog->log(
            "Association deleted: " . $this->label($event->entity),
            null,
            $this->user(),
            ['event' => 'deleted', 'id' => $event->entity->getKey()],
            null,
            $event->entityType,
        );
    }

    private function describe(array $changes): string
    {
        $parts = [];

        foreach ($changes as $field => $change) {
            if (in_array($field, ['updated_at', 'remember_token'], true)) {
                continue;
            }

            $label = Association::labels()[$field] ?? $field;
            $parts[] = $label . ': ' . $change['old'] . ' -> ' . $change['new'];
        }

        return implode(', ', $parts);
    }

    private function boolLabel(mixed $value): string
    {
        return $value ? 'Aktif' : 'Nonaktif';
    }

    private function label($entity): string
    {
        return (string) ($entity->name ?? $entity->getKey());
    }

    private function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth('sanctum')->user() ?? auth()->user();
    }
}