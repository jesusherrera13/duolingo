<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'name' => 'Jesús Herrera',
            'email' => 'jesusherrera13@gmail.com',
            'password' => '$2y$10$oIsnvXUi6DwR14GQzvBXmOFtX6.FeofhzyZ3sm4UsxnpXH0BMoH76',
        ]);

        DB::table('languages')->insert([
            'name' => 'Chinese',
            'code' => 'zh',
        ]);
        DB::table('languages')->insert([
            'name' => 'French',
            'code' => 'fr',
        ]);

        DB::table('hsk')->insert([
            'name' => 'HSK 1',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 2',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 3',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 4',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 5',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 6',
        ]);
        DB::table('hsk')->insert([
            'name' => 'HSK 7',
        ]);
    }
}
