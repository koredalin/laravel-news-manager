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
                'name' => 'NEWS_API_ORG',
                'base_url' => 'https://newsapi.org/v2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'NEWS_DATA_IO',
                'base_url' => 'https://newsdata.io/api/1',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
