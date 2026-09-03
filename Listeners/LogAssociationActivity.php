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

        $this->activityLog->log(
            "Association updated: " . $this->label($event->entity),
            $event->entity,
            $this->user(),
            ['event' => 'updated', 'changes' => $event->changes],
        );
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

    private function label($entity): string
    {
        return (string) ($entity->name ?? $entity->getKey());
    }

    private function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth('sanctum')->user() ?? auth()->user();
    }
}
