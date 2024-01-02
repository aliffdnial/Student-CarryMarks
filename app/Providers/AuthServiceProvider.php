<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Lecturer;
use App\Policies\StudentPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\LecturerPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Subject::class => SubjectPolicy::class,
        Lecturer::class => LecturerPolicy::class,
        Student::class => StudentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Admin: userLevel =0, lecturer: userLevel=3, student: userLevel=5
        Gate::define('isAdmin', function ($user){
            return $user->user_level == 0;
            });
        Gate::define('isALecturer', function ($user){
            return $user->user_level == 3;
        });
        Gate::define('isStudent', function ($user){
            return $user->user_level == 5;
        });
    }
}
