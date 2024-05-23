<?php

namespace App\Providers;
use App\Models\User;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Opcodes\LogViewer\Facades\LogViewer;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        LogViewer::auth(function ($request) {
            // Get the authenticated user
            $user = $request->user();

            // Check if the user is authenticated and has user_type = 1
            if ($user && $user->user_type == 1) {
                // Return true to allow access
                return true;
            }

            // If no user is authenticated or user_type is not 1, return false
            return false;
        });
    }


}
