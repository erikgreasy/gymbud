<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Models\Exercise;
use App\Models\Record;
use App\Models\Session;
use App\Policies\CategoryPolicy;
use App\Policies\ExercisePolicy;
use App\Policies\RecordPolicy;
use App\Policies\SessionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Exercise::class => ExercisePolicy::class,
        Category::class => CategoryPolicy::class,
        Session::class => SessionPolicy::class,
        Record::class => RecordPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
