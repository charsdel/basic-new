<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([

            'name' => 'carlos Delgado M.',
            'email' => 'cd.btodo@gmail.com',
            'password' => bcrypt('1234') 
        ]

        );

        \App\Models\Post::factory(30)->create();

        
    }
}
