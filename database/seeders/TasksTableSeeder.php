<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the table before seeding
        DB::table('tasks')->truncate();

        // Insert the provided data
        DB::table('tasks')->insert([
            [
                'id' => 1,
                'title' => 'This is task 1',
                'description' => 'This is task 1 Description',
                'completed' => 1,
                'created_at' => Carbon::parse('2024-06-29 16:05:24'),
                'updated_at' => Carbon::parse('2024-06-29 16:05:25'),
            ],
            [
                'id' => 2,
                'title' => 'This is task 2',
                'description' => 'This is task 2 Description',
                'completed' => 1,
                'created_at' => Carbon::parse('2024-06-29 16:05:22'),
                'updated_at' => Carbon::parse('2024-06-29 16:05:25'),
            ],
        ]);
    }
}
