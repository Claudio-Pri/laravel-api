<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Helpers (importo Schema per abilitare il truncate sulla foreign key)
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//Models
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disabilito i vincoli di foreign key
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        //abilito i vincoli di foreign key dopo il truncate
        Schema::enableForeignKeyConstraints();


        $allTypes = [
            'development',
            'marketing',
            'design',
            'learning',
        ];
        foreach ($allTypes as $singleType) {
            $type = Type::create([
                'title' => $singleType,
                'slug' => str()->slug($singleType),
            ]);
        }
    }
}
