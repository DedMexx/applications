<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Manager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         Client::factory(20)->create();

         Comment::factory(44)->create();

         Manager::factory()->create([
             'username' => 'admin_1',
             'password' => bcrypt('qwerty1')
         ]);

        Manager::factory()->create([
            'username' => 'admin_2',
            'password' => bcrypt('qwerty2'),
            'login_date' => '2023-08-16 15:49'
        ]);
    }
}
