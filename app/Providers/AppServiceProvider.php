<?php

namespace App\Providers;

use App\Models\TrxPembayaran;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
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
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url') . "/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        Gate::define('trx-peserta', function (User $user, TrxPembayaran $trx) {
            return $user->ref_peserta->id == $trx->peserta_id;
        });

        if (config('app.env') === 'local') {
            URL::forceScheme('https');
        }
    }
}
