<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Provider;
use stdClass;
use App\Exceptions\DownloadNewsException;

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
            $provider = $category->providers->filter(function ($provider) use ($providerName) {
                return $provider->name == $providerName;
            })->first();

            if ($provider) {
                $apiKey = config('secret.' . Provider::NEWS_API_ORG_KEY);
                $apiBaseUrl = $provider->base_url . '/' . self::ARTICLE;
                $apiResponse = Http::get($apiBaseUrl, [
                    'apiKey' => $apiKey,
                    'category' => $category->name,
                    'page' => $page,
                ]);

                if ($apiResponse->successful()) {
                    $resultArr = $apiResponse->json();
                    if (is_array($resultArr) && !empty($resultArr)) {
                        $result = json_decode(json_encode($resultArr));
                    }
                } else {
                    throw new DownloadNewsException("API request failed for category: "
                        . "{$category->name} with status code: " . $apiResponse->status());
                }
            }
        } catch (DownloadNewsException $e) {
            Log::error("Exception caught during API request to {$category->name}. " . $e->getMessage());
        }

        return $result;
    }
}
