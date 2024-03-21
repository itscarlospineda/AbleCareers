<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Job_Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPositionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentJobPositions = Job_Position::where('is_active','ACTIVE')->get();
        $currentCategories = Category::where('is_active','ACTIVE')->get();
        $numberofCategories = count($currentCategories);
        foreach ($currentJobPositions as $jobPosition) {
            DB::table('jopo_category')->insert([
                'category_id' => random_int(1,$numberofCategories),
                'job_position_id' => $jobPosition->id,
            ]);
        }
    }
}
