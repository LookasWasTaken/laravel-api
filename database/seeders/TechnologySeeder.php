<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = 
        [
            ['HTML', 'primary'],
            ['CSS', 'secondary'],
            ['Bootstrap', 'success'],
            ['JavaScript', 'danger'],
            ['VueJS', 'warning'],
            ['SASS', 'light'],
            ['PHP', 'dark'],
            ['MySQL', 'muted'],
            ['Laravel', 'white'],
        ];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->name = $new_technology[0];
            $new_technology->color = $technology[1];
            $new_technology->slug = Str::slug($new_technology->name, '-');
            $new_technology->save(); 
        }
    }
}
