<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Role;
use App\Models\Vet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Role::insert([
            [
                'name' => 'user'
            ],
            [
                'name' => 'admin'
            ]
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@demo.com',
            'role_id' => '2' // admin
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'test2@demo.com',
            'role_id' => '1' // user
        ]);
        
        AnimalType::insert([
            [
                'name' => 'kutya'
            ],
            [
                'name' => 'macska'
            ],
            [
                'name' => 'nyúl'
            ],
            [
                'name' => 'bárány'
            ],
            [
                'name' => 'kecske'
            ],
        ]);

        Animal::insert([
            [
                'name' => 'Cirmi',
                'is_male' => 0,
                'birthday' => '2015-11-10',
                'image' => null,
                'animal_type_id' => 2
            ],
            [
                'name' => 'Bodri',
                'is_male' => 1,
                'birthday' => '2019-08-05',
                'image' => null,
                'animal_type_id' => 1
            ]
        ]);

        Vet::insert([
            [
                'name' => 'Dr. Kovács Sándor',
                'zipcode' => 9400,
                'city' => 'Sopron',
                'street' => 'Valami utca',
                'street_number' => 14,
                'phone_number' => '+36308888888'
            ],
            [
                'name' => 'Dr. Fehér András',
                'zipcode' => 7777,
                'city' => 'Valamiváros',
                'street' => 'Fehér utca',
                'street_number' => 7,
                'phone_number' => '+36307778888'
            ],
        ]);
    }
}
