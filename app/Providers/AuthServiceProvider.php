<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Equipment;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordLine;
use App\Models\Medicine;
use App\Models\Nourishment;
use App\Models\Supplier;
use App\Models\Supply;
use App\Models\User;
use App\Models\Vet;
use App\Policies\BasePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Animal::class => BasePolicy::class,
        AnimalType::class => BasePolicy::class,
        Equipment::class => BasePolicy::class,
        MedicalRecord::class => BasePolicy::class,
        MedicalRecordLine::class => BasePolicy::class,
        Medicine::class => BasePolicy::class,
        Nourishment::class => BasePolicy::class,
        Supplier::class => BasePolicy::class,
        Supply::class => BasePolicy::class,
        User::class => BasePolicy::class,
        Vet::class => BasePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
