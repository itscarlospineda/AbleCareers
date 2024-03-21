<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'name' => 'tecnologia'
            ],
            [
                'name' => 'economia'
            ],
            [
                'name' => 'arte y entretenimiento'
            ],
            [
                'name' => 'ciencia y educacion'
            ],
            [
                'name' => 'manufactura y produccion'
            ],
            [
                'name' => 'transporte y logica'
            ],
            [
                'name' => 'construccion y mantenimiento'
            ],
            [
                'name' => 'agricultura y ganaderia'
            ],
            [
                'name' => 'servicio al cliente'
            ],
        ];
        DB::table('category')->insert($categories);
    }
}
