<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
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
        foreach ($categoryUrls as $category) {
            foreach ($category as $catUrl) {
                foreach (Provider::API_KEYS as $keyIndex => $apiKey) {
                    if (strpos($catUrl, $apiKey) !== false) {
                        $resultUrls[Provider::API_NAMES[$keyIndex]][] =
                            str_replace($apiKey, config('secret.' . $apiKey), $catUrl);
                    }
                }
            }
        }
        
        return $resultUrls;
    }
    
    public function downloadCategoryNews(Category $category, int $page = 1): array
    {
        $result = [];
        $result[Provider::NEWS_API_ORG] = $this->newsApi->downloadContentByCategoryUrlPage($category, $page);

        $result[Provider::NEWS_DATA_IO] = $this->newsData->downloadContentByCategoryUrlPage($category, $page);

        return $result;
    }
}
