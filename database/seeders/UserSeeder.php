<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Postulant',
                'lastName' => 'Test',
                'email' => 'postulant@mail.com',
                'phoneNumber' => '9999-9999',
                'password' => Hash::make('password'),

            ],
            [
                'name' => 'Super User',
                'lastName' => 'Test',
                'email' => 'superuser@mail.com',
                'phoneNumber' => '9999-9999',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Recruiter',
                'lastName' => 'Test',
                'email' => 'recruiter@mail.com',
                'phoneNumber' => '9999-9999',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Manager',
                'lastName' => 'Test',
                'email' => 'manager@mail.com',
                'phoneNumber' => '9999-9999',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'CEO',
                'lastName' => 'Test',
                'email' => 'ceo@mail.com',
                'phoneNumber' => '9999-9999',
                'password' => Hash::make('password'),
            ],
        ];
        DB::table('users')->insert($users);

        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'phoneNumber' => $faker->phoneNumber,
                'password' => Hash::make('password')
            ]);
        }
    }
}
