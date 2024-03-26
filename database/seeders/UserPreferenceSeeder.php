<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_preferences')->insert([
            [
                'user_id' => 1,
                'categories' => '[3,4,5]',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'categories' => '[3,8,13,17]',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
