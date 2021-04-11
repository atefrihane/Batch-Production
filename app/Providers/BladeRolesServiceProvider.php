<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeRolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('permit', function ($expression) {

            return [
                'firstStep' => Auth::user()->role->name == 'first step' || Auth::user()->role->name == 'superadmin',
                'secondStep' => Auth::user()->role->name == 'second step' || Auth::user()->role->name == 'superadmin',
                'thirdStep' => Auth::user ()->role->name == 'third step' || Auth::user()->role->name == 'superadmin',
                'fourthStep' => Auth::user()->role->name =='accountant ' || Auth::user()->role->name == 'superadmin',
                'superadmin' => Auth::user()->role->name == 'superadmin',
            ][$expression];
        });

        Blade::directive('format', function ($expression) {
            return "<?php echo round($expression,2); ?>";
        });

    }
}
