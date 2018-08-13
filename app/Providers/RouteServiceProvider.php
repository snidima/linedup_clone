<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapTeaacherRoutes();

        $this->mapManagerRoutes();

        $this->mapAdministratorRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapTeaacherRoutes()
    {
        Route::prefix('teacher')
            ->middleware(['web','teacher'])
            ->namespace($this->namespace)
            ->group(base_path('routes/teacher.php'));
    }

    protected function mapManagerRoutes()
    {
        Route::prefix('manager')
            ->middleware(['web','manager'])
            ->namespace($this->namespace)
            ->group(base_path('routes/manager.php'));
    }

    protected function mapAdministratorRoutes()
    {
        Route::prefix('administrator')
            ->middleware(['web','administrator'])
            ->namespace($this->namespace)
            ->group(base_path('routes/administrator.php'));
    }

}
