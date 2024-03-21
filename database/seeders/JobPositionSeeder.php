<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentCompanies = Company::where('is_active', 'ACTIVE')->get();

        $faker = Faker::create();

        foreach ($currentCompanies as $company) {
            DB::table('job_position')->insert([
                'name' => $faker->jobTitle,
                'description' => $faker->paragraph,
                'post_date' => $faker->dateTimeThisYear,
                'company_id' => $company->id,
            ]);
        }
    }
}
