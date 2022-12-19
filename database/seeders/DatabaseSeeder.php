<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Official database seeder for depolyment
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('subjects')->insert([
            'name' => "Mathematics",
            'slug' => "mathematics",
        ]);
        DB::table('subjects')->insert([
            'name' => "Science",
            'slug' => "science",
        ]);
        DB::table('subjects')->insert([
            'name' => "English",
            'slug' => "english",
        ]);
        DB::table('subjects')->insert([
            'name' => "Social Studies",
            'slug' => "social-studies",
        ]);

        $this->call([
            PermissionSeeder::class,
            TestSeeder::class,
        ]);

    }
}
