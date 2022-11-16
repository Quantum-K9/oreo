<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // EDIT THIS AT SOME POINT
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "kiancolin.chua@sjcs.edu.ph",
            'password' => Hash::make("Admin123456"),
        ]);

        DB::table('subjects')->insert([
            'name' => "Mathematics",
        ]);
        DB::table('subjects')->insert([
            'name' => "Science",
        ]);
        DB::table('subjects')->insert([
            'name' => "English",
        ]);
        DB::table('subjects')->insert([
            'name' => "Social Studies",
        ]);

        DB::table('tasks')->insert([
            'title' => 'Task1',
            'description' => 'stuff',
            'subject_id' => 1,
            'due_at' => '2022-11-10 20:00:00',
        ]);

        DB::table('tasks')->insert([
            'title' => 'Task2',
            'description' => 'more stuff',
            'subject_id' => 3,
            'due_at' => '2022-11-10 18:30:00',
        ]);

        DB::table('tasks')->insert([
            'title' => 'Task3.2',
            'description' => 'even more stuff',
            'subject_id' => 4,
            'due_at' => '2022-11-20 20:00:00',
        ]);

    }
}
