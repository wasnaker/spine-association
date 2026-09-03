<?php

declare(strict_types=1);

namespace Modules\Association\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Region\Models\Province;
use Modules\Region\Models\Regency;
use Spine\Traits\HasLifecycleHooks;

/**
 * Association — asosiasi surveyor per provinsi (DPW RUI <Provinsi>).
 *
 * - 1 asosiasi per provinsi (province_id UNIQUE).
 * - Tanpa cabang/NPWP: entity tunggal, identitas = nama + wilayah.
 * - admin_id: FK ke users — 1 admin per asosiasi.
 * - province_id/regency_id: FK ke modules Region (referensi wilayah).
 */
class Association extends Model
{
    use HasLifecycleHooks;
    use HasUlids;
    use SoftDeletes;

    protected $table = 'associations';

    protected $fillable = [
        'code',
        'name',
        'province_id',
        'regency_id',
        'admin_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function uniqueIds(): array
    {
        return ['ulid'];
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}
