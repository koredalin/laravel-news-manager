<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Provider;
use stdClass;

/**
 * Description of NewsDataIoService
 *
 * @author H1
 */
class NewsDataIoService
{
    public const LANGUAGE = 'en';
    public const ARTICLE = 'news';
    public const API_PAGE_SIZE = 20;

    public function downloadContentByCategoryUrlPage(Category $category, ?int $page = null): ?stdClass
    {
        $result = null;
        try {
            $providerName = Provider::NEWS_DATA_IO;
            $provider = $category->providers->filter(function ($provider) use ($providerName) {
                return $provider->name == $providerName;
            })->first();

            if ($provider) {
                $apiKey = config('secret.' . Provider::NEWS_DATA_IO_KEY);
                $apiBaseUrl = $provider->base_url . '/' . self::ARTICLE;
                $apiResponse = Http::get($apiBaseUrl, [
                    'apikey' => $apiKey,
                    'category' => $category->name,
                    'language' => self::LANGUAGE,
                    'page' => $page,
                ]);

                if ($apiResponse->successful()) {
                    $resultArr = $apiResponse->json();
                    if (is_array($resultArr) && !empty($resultArr)) {
                        $result = json_decode(json_encode($resultArr));
                    }
                } else {
                    Log::error("API request failed for category: {$category->name} with status code: " . $apiResponse->status());
                }
            }
        } catch (\Exception $e) {
            Log::error("Exception caught during API request to {$category->name}. " . $e->getMessage());
        }

        return $result;
    }
}
