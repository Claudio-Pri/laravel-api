<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers (importo Schema per abilitare il truncate sulla foreign key)
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//per slug da documentazione laravel
use Illuminate\Support\Str;

//Models
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disabilito i vincoli di foreign key
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        //abilito i vincoli di foreign key dopo il truncate
        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 5; $i++) {
            $title = fake()->catchPhrase();
            //slug da documentazione laravel
            $slug = Str::of($title)->slug('-');
            //type casuale
            $randomType = Type::inRandomOrder()->first();

            $project = Project::create([
                'title' => $title,
                'slug' => $slug,
                'url' => fake()->url(),
                'description' => fake()->paragraph(),
                'type_id' => $randomType->id,
            ]);
            //many to many seeding
            $technologyIds = [];
            for ($j = 0; $j < rand(0, Technology::count()); $j++) {
                $randomTechnology = Technology::inRandomOrder()->first();
                if (!in_array($randomTechnology->id, $technologyIds)) {
                    $technologyIds[] = $randomTechnology->id;
                }
            }

            $project->technologies()->sync($technologyIds);

        }
    }
}


//errore sul seeder da vedere
