<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\user_has_role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentCompanies = Company::where('is_active', 'ACTIVE')->get();

        $numberOfCompanies = count($currentCompanies);

        $usersForCompany = user_has_role::where('is_active', 'ACTIVE')
        ->whereIn('role_id',[2,3])
        ->get();

        foreach ($usersForCompany as $user) {
            DB::table('company_user')->insert([
                'user_id' => $user->user->id,
                'comp_id' => random_int(1,$numberOfCompanies)
            ]);
        }
    }
}
