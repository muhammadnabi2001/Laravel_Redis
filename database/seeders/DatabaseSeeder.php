<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Fakultet;
use App\Models\University;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        for ($i=1; $i <=35; $i++) { 
            Category::create([
                'name'=>'Category'.$i
            ]);
        }
        for ($i=1; $i <=10 ; $i++) { 
            University::create([
                'name'=>'Universitet'.$i,
                'location'=>'Location'.$i
            ]);
        }
        for ($i=0; $i <=100; $i++) { 
            Fakultet::create([
                'name'=>'facultet'.$i,
                'universitet_id'=>rand(1,10)
            ]);
        }
    }
}
