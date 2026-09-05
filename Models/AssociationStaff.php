<?php

namespace Modules\Association\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class AssociationStaff extends Model
{
    protected $table = 'association_staffs';

    protected $fillable = [
        'user_id',
        'association_id',
        'realname',
        'jabatan',
        'phone',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class, 'association_id');
    }
}