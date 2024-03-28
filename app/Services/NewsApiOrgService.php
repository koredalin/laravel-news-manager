<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use jcobhams\NewsApi\NewsApi;
use App\Models\Category;
use App\Models\Provider;
use stdClass;

/**
 * Description of NewsApiOrgService
 *
 * @author H1
 */
class NewsApiOrgService
{
    public const ARTICLE = 'top-headlines';
    public const API_PAGE_SIZE = 10;

    public function downloadContentByCategoryUrlPage(Category $category, ?int $page = null): ?stdClass
    {
        $result = null;
        try {
            $providerName = Provider::NEWS_API_ORG;
            $hasProvider = $category->providers->contains(function ($provider) use ($providerName) {
                return $provider->name == $providerName;
            });

            if ($hasProvider) {
                $apiKey = config('secret.' . Provider::NEWS_API_ORG_KEY);

                $newsapi = new NewsApi($apiKey);

                # /v2/top-headlines
                $result = $newsapi->getTopHeadlines(null, null, null, $category->name, self::API_PAGE_SIZE, $page);
            }
        } catch (\Exception $e) {
            Log::error("Exception caught during API request to ".Provider::NEWS_API_ORG.".category: {$category->name}. " . $e->getMessage());
        }
        
        return $result;
    }
}
