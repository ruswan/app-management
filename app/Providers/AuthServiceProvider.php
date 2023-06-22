<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\DepartmentPolicy;
use App\Policies\DepartmentProjectPolicy;
use App\Policies\ModulePolicy;
use App\Policies\ProductionYearPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ProjectUserPolicy;
use App\Policies\ServerPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        ProjectPolicy::class,
        DepartmentPolicy::class,
        DepartmentProjectPolicy::class,
        ModulePolicy::class,
        ServerPolicy::class,
        ProjectUserPolicy::class,
        ProductionYearPolicy::class,
        UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
