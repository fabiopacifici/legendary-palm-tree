<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->name = $faker->words(4, true);
            $project->cover_image = $faker->imageUrl(640, 400, 'Projects', true, $project->name, true, 'jpg');
            $project->description = $faker->paragraphs(5, true);
            $project->project_url = $faker->url();
            $project->source_code_url = $faker->url();
            $project->save();
        }
    }
}
