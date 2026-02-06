<?php

namespace App\Providers;

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
        if($this->app->environment('local')) {
        // Força HTTPS
        \Illuminate\Support\Facades\URL::forceScheme('https');
        
        // AQUI É O PULO DO GATO: Forçamos a raiz exata, SEM a porta no final.
        \Illuminate\Support\Facades\URL::forceRootUrl('https://legendary-space-doodle-6pqv7x659vx2qr9-8000.app.github.dev');
    }
    }
}
