<?php

namespace App\Providers;

use App\Models\CodeGenModel;
use App\Policies\CodeGenModelPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        CodeGenModel::class => CodeGenModelPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}