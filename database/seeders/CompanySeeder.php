<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\user_has_role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $ceoUsers = user_has_role::where('is_active', 'ACTIVE')
        ->where('role_id',4)
        ->get();
        foreach ($ceoUsers as $index) {
            DB::table('company')->insert([
                'user_id' => $index->user->id,
                'comp_name' => $faker->company,
                'comp_mail' => $faker->companyEmail,
                'comp_phone' => $faker->phoneNumber,
                'comp_city' => 'San Pedro Sula',
                'comp_depart' => 'Cortes',
            ]);
        }
    }
}
