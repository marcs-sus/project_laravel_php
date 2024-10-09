<?php

namespace Database\Seeders;

use App\Models\Proposal;
use App\Models\User;
use App\Models\Project;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(100)
            ->create();

        User::query()->inRandomOrder()->limit(10)->get()
            ->each(function (User $u) {
                $project = Project::factory()->create(['created_by' => $u->id]);
                
                Proposal::factory()->count(random_int(5, 50))->create(['project_id' => $project->id]);
            });
    }
}
