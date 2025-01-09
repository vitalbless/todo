<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate для проверки доступа к действиям с задачами
        Gate::define('manage-tasks', function (User $user) {
            return !$user->isBlocked();
        });

        // Gate для административных действий
        Gate::define('admin-actions', function (User $user) {
            return $user->isAdmin() && !$user->isBlocked();
        });
    }
}
