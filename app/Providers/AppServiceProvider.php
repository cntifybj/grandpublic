<?php

namespace App\Providers;

use App\Models\Advisory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);


        View::composer('layouts.app', function ($view) {

            $advisories = Advisory::where('position', 'pop-up')
                ->where('visible', 1)
                ->get();

            $popUpImagesUrl = [];

            if ($advisories->count() > 0)
                foreach ($advisories as $advisory)
                    $popUpImagesUrl[] = Storage::url($advisory->file);

            $view->with(['popUpImagesUrl' => $popUpImagesUrl]);
        });
    }
}
