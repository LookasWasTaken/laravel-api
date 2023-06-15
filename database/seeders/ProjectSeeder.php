<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = 
        [
            ['DC Comics', 'uploads/dccomics.png', 3, '2023-05-29'],
            ['Portfolio', 'uploads/portfolio.png', 3, '2023-06-15'],
            ['API', 'uploads/api.png', 2, '2023-06-14'],
            ['Discord', 'uploads/discord.png', 1, '2023-02-07'],
            ['Spotify', 'uploads/spotify.png', 1, '2023-02-23'],
            ['WhatsApp', 'uploads/whatsapp.png', 1, '2023-03-31'],
            ['FizzBuzz', 'uploads/fizzbuzz.png', 1, '2023-03-10'],
            ['Yu-Gi-Oh!', 'uploads/yugioh.png', 1, '2023-04-30'],
            ['Campo Minato', 'uploads/campominato.png', 1, '2023-03-20'],
            ['Netflix', 'uploads/netflix.png', 1, '2023-04-27'],
            ['N E X G E N', 'uploads/nexgen.png', 1, '2023-05-10'],
        ];
        foreach ($projects as $project) {
            $new_project = new Project();
            $new_project->name = $project[0];
            $new_project->image = $project[1];
            $new_project->type_id = $project[2];
            $new_project->date = $project[3];
            $new_project->repo = Project::linkGenerator($new_project->name);
            $new_project->slug = Str::slug($new_project->name, '-');
            $new_project->save(); 
        }
    }
}
