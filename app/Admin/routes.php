<?php

use App\Admin\Controllers\HomeController;
use Encore\Admin\Facades\Admin;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', [HomeController::class,'index'])->name('home');
    $router->resource('users', UserController::class);
    
    $router->resource('country', CountryController::class);
    $router->resource('tour-trong-nuoc', TourTrongNuocController::class);
    $router->resource('olders', OlderController::class);
    $router->resource('supports', SupportController::class);
    $router->resource('blogs', BlogController::class);
    $router->resource('honey-moons', HoneyMoonController::class);

});

