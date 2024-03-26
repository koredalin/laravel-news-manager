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
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=business',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=business',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=entertainment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=entertainment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 3,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=general',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=health',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=health',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 5,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=science',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 5,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=science',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 6,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=sports',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 6,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=sports',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 7,
                'provider_id' => 1,
                'source_url' => 'https://newsapi.org/v2/top-headlines?apiKey=NEWS_API_ORG_KEY&category=technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 7,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 8,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=crime',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 9,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=domestic',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 10,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=education',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 11,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=environment',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 12,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=food',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 13,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=lifestyle',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 14,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=other',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 15,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=politics',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 16,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=top',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 17,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=tourism',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 18,
                'provider_id' => 2,
                'source_url' => 'https://newsdata.io/api/1/sources?apikey=NEWS_DATA_IO_KEY&category=world',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
