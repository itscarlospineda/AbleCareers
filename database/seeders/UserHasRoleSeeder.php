<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $important = [
            [
                'user_id' => 1,
                'role_id' => 1
            ],
            [
                'user_id' => 2,
                'role_id' => 5
            ],
            [
                'user_id' => 3,
                'role_id' => 2
            ],
            [
                'user_id' => 4,
                'role_id' => 3
            ],
            [
                'user_id' => 5,
                'role_id' => 4
            ],
        ];
        DB::table('user_has_role')->insert($important);
        for ($i=6; $i < 106; $i++) {
            DB::table('user_has_role')->insert([
                'user_id' => $i,
                'role_id' => random_int(1,4),
            ]);
        }
    }
}
