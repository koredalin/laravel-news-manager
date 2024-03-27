<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Provider;

class NewsLoaderService
{
    public function __construct(
        private NewsApiOrgService $newsApi,
        private NewsDataIoService $newsData
    ) {}
    
    public function replaceApiKeys(array $categoryUrls): array
    {
        $resultUrls = [];
        foreach ($categoryUrls as $catUrl) {
            foreach (Provider::API_KEYS as $keyIndex => $apiKey) {
                if (strpos($catUrl, $apiKey) !== false) {
                    $resultUrls[Provider::API_NAMES[$keyIndex]][] =
                        str_replace($apiKey, config('secret.' . $apiKey), $catUrl);
                }
            }
        }
        
        return $resultUrls;
    }
}
