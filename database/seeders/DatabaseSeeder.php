<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\MedicalRecord;
use App\Models\MedicalRecordLine;
use App\Models\Medicine;
use App\Models\Role;
use App\Models\Supplier;
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

        Medicine::insert([
            [
               'name' => 'CATAFLAM 50 MG BEVONT TABLETTA',
                'description' => null,
                'active_substance' => 'diclofenac',
                'registration_number' => 'OGYI-T-05573'
            ]
        ]);

        MedicalRecord::insert([
            [
                'description' => 'Vizsgálat I.',
                'examination_date' => '2023-10-27',
                'next_examination' => '2023-10-30',
                'total_cost' => 50000,
                'animal_id' => 1,
                'vet_id' => 1    
            ]
        ]);

        MedicalRecordLine::insert([
            [
                'examination_name' => 'Védőoltás I.',
                'cost' => '25000',
                'medical_record_id' => 1
            ],
            [
                'examination_name' => 'Védőoltás II.',
                'cost' => '25000',
                'medical_record_id' => 1
            ]
        ]); 

        Supplier::insert([
            [
                'name' => 'Medic Kft.',
                'tax_number' => '11111111-1-11',
                'registration_number' => '11 11 111111'              
            ]
        ]);
    }
}
