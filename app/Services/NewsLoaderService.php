<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Provider;
use stdClass;

class NewsLoaderService
{
    public function __construct(
        private NewsApiOrgService $newsApi,
        private NewsDataIoService $newsData,
        private NewsCacheService $newsCache
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

    public function getNewsApiCategoryNews(Category $category, ?int $page = null): ?stdClass
    {
        $newsApiCache = $this->newsCache->unserialize(Provider::NEWS_API_ORG, $category->id, $page);
        if (empty($newsApiCache)) {
            $newsApiCache = $this->newsApi->downloadContentByCategoryUrlPage($category, $page);
            if ($newsApiCache) {
                $this->newsCache->serialize(Provider::NEWS_API_ORG, $category->id, $page, time(), $newsApiCache);
            }
        }

        return $newsApiCache;
    }

    public function getNewsDataCategoryNews(Category $category, ?int $page = null): ?stdClass
    {
        $newsDataCache = $this->newsCache->unserialize(Provider::NEWS_DATA_IO, $category->id, $page);
        if (empty($newsDataCache)) {
            $newsDataCache = $this->newsData->downloadContentByCategoryUrlPage($category, $page);
            if ($newsDataCache) {
                $this->newsCache->serialize(Provider::NEWS_DATA_IO, $category->id, $page, time(), $newsDataCache);
            }
        }

        return $newsDataCache;
    }
}
