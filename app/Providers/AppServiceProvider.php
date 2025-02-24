<?php

namespace App\Providers;

use App\Models\Curriculo;
use App\Models\User;
<<<<<<< HEAD
use Illuminate\Support\Facades\Gate;
=======
use App\Policies\CurriculoPolicy;
>>>>>>> 00b4e0dd525e9738337751202847061c4c77d145
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Gate;
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
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });
<<<<<<< HEAD
        Gate::define('update-curriculo', function (User $user, Curriculo $curriculo) {
            return $user->id === $curriculo->user_id;
        });
=======
        Gate::before(function (User $user, string $ability) {
            if ($user->isAdministrator()) {
                return true;
            }
        });
        Gate::policy(Curriculo::class, CurriculoPolicy::class);
>>>>>>> 00b4e0dd525e9738337751202847061c4c77d145
    }
}
