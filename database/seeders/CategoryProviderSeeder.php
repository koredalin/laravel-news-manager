<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoryProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_provider')->insert([
            [
                'category_id' => 1,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 3,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 5,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 5,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 6,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 6,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 7,
                'provider_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 7,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 8,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 9,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 10,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 11,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 12,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 13,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 14,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 15,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 16,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 17,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 18,
                'provider_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
