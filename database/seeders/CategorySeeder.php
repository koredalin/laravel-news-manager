<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'business',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'entertainment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'general',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'health',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'science',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'sports',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'crime',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'domestic',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'education',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'environment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'lifestyle',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'other',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'politics',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'top',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'tourism',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'world',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
