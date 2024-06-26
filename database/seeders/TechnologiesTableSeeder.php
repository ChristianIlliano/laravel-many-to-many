<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['AI', 'Vue.js', 'HTML', 'CSS', 'React', 'Express', 'Django'];

        foreach ($technologies as $technology) {
            $newtechnology = new Technology();
            $newtechnology ->name = $technology;
            $newtechnology->save();
        }
    }
}
