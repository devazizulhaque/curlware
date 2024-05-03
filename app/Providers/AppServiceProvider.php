<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Repositories\GenericRepository;
use App\Repositories\Interface\RepositoryInterface;
use App\Services\BrandService;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->when(BrandService::class)
        //     ->needs(RepositoryInterface::class)
        //     ->give(function ($app) {
        //         return new GenericRepository(Brand::class);
        // });

        // $this->app->when(CategoryService::class)
        //     ->needs(RepositoryInterface::class)
        //     ->give(function ($app) {
        //         return new GenericRepository(Category::class);
        // });

        $this->app->bind(RepositoryInterface::class, function ($app) {
            $serviceClass = $this->app->get(\Illuminate\Contracts\Foundation\Application::SERVICE);
            $modelName = substr($serviceClass, strrpos($serviceClass, '\\') + 1, -7);
            $modelClass = "App\\Models\\$modelName";
            
            return new GenericRepository($modelClass);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
