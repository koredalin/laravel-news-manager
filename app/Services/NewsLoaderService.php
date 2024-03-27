<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NewsLoaderService
{
    public const API_KEYS = [
        'NEWS_API_ORG_KEY',
        'NEWS_DATA_IO_KEY',
    ];

    public function replaceApiKeys(array $categoryUrls): array
    {
        $resultUrls = [];
        foreach ($categoryUrls as $catUrl) {
            foreach (self::API_KEYS as $apiKey) {
                if (strpos($catUrl, $apiKey) !== false) {
                    $resultUrls[] = str_replace($apiKey, config('secret.' . $apiKey), $catUrl);
                }
            }
        }
        
        return $resultUrls;
    }

    public function downloadContentByCategoryId(int $categoryId): string {
        return DB::table('skills')->get();
    }
}
