<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            [
                'name' => 'News Api',
                'base_url' => 'https://newsapi.org',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'NEWSDATA.IO',
                'base_url' => 'https://newsdata.io',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
