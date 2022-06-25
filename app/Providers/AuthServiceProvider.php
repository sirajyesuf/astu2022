<?php

namespace App\Providers;

use App\Models\DeptGroupPhoto;
use App\Models\Event;
use App\Models\School;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\SchoolPolicy;
use App\Policies\EventPolicy;
use App\Policies\StudentPolicy;
use App\Policies\DayPolicy;
use App\Policies\DeptGroupPhotoPolicy;
use App\Policies\TokenPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

        User::class => UserPolicy::class,
        School::class => SchoolPolicy::class,
        Student::class => StudentPolicy::class,
        Event::class => EventPolicy::class,
        Day::class => DayPolicy::class,
        Token::class => TokenPolicy::class,
        DeptGroupPhoto::class => DeptGroupPhotoPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
