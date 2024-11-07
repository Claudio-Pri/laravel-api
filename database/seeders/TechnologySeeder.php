<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Helpers (importo Schema per abilitare il truncate sulla foreign key)
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Models
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disabilito i vincoli di foreign key
        Schema::disableForeignKeyConstraints();
        Technology::truncate();
        //abilito i vincoli di foreign key dopo il truncate
        Schema::enableForeignKeyConstraints();
        $allTechnologies = [
            'HTML',
            'CSS',
            'JS',
            'VUE',
            'PHP',
            'SQL',
            'LARAVEL'
        ];
        foreach ($allTechnologies as $singleTechnology) {
            $technology = Technology::create([
                'title' => $singleTechnology,
            ]);
        }
    }
}
