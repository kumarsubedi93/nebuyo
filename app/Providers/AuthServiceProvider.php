<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\CustomField\Provider as CustomFieldProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    'App\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
      $this->registerPolicies();

      Gate::define('isSeller', function($user) {
          return $user->user_type == 'seller';
      });

      Gate::define('isCustomer', function($user) {
          return $user->user_type == 'customer';
      });

  }

    public function register()
    {
        $this->app->register(CustomFieldProvider::class);
    }

}
