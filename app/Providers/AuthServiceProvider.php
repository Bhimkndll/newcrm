<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {


        $this->registerPolicies();
/*for main admin super admin*/



Gate::before(function ($user, $ability) { /*always check gate and reject all possible gate for  super admin*/
return $user->role=='level3' ? true : null;
});

      Gate::define('super-admin', function($user) {
           return $user->role == 'level3';
        });
       
        /* define a manager user role */
        Gate::define('admin', function($user) {
            return $user->role == 'level2';
        });
      
        /* define a user role */
        Gate::define('user', function($user) {
            return $user->role == 'level1';
        });


        
    }
}
