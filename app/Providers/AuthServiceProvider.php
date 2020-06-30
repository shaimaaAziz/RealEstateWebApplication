<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       Gate::define('manage-users' , function($user){
        return $user->hasAnyRole('أدمن');
       });

       Gate::define('user' , function($user){
        return $user->hasAnyRole('مستخدم');
       });

       Gate::define('owner' , function($user){
        return $user->hasAnyRole('صاحب العقار');
       });
       
    //    Gate::define('users' , function($user){
    //     return $user->hasAnyRoles(['أدمن','مستخدم']);
    //    });
    }
}
