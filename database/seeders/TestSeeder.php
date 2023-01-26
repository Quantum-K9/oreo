<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Create filler data for testing -- delete before release
     *
     * @return void
     */
    public function run()
    {

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

        DB::table('resources')->insert([
            'title' => 'YouTube video',
            'resource_type' => false,
            'url' => "https://www.youtube.com/watch?v=dQw4w9WgXcQ",
            'owner_id' => 1,
        ]);

    }
}
