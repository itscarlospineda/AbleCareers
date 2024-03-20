<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            [
                'role_name' => 'postulante',
                'role_desc' => 'Role de menor nivel (usuario comun)',
            ],
            [
                'role_name' => 'reclutador',
                'role_desc' => 'Role de reclutar postulantes',
            ],
            [
                'role_name' => 'manager',
                'role_desc' => 'Role de crear reclutadores',
            ],
            [
                'role_name' => 'CEO',
                'role_desc' => 'Role para crear manager y reclutadores',
            ],
            [
                'role_name' => 'superUsuario',
                'role_desc' => 'Role de Administrador total',
            ],
        ];
        DB::table('role')->insert($roles);
    }
}
