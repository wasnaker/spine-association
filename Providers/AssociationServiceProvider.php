<?php

declare(strict_types=1);

namespace Modules\Association\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\Association\Listeners\LogAssociationActivity;

class AssociationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // HOOK — entity lifecycle (HasLifecycleHooks).
        Event::listen(\Spine\Events\EntityCreated::class, LogAssociationActivity::class . '@created');
        Event::listen(\Spine\Events\EntityUpdated::class, LogAssociationActivity::class . '@updated');
        Event::listen(\Spine\Events\EntityDeleted::class, LogAssociationActivity::class . '@deleted');
    }
}
