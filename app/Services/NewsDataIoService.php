<?php

namespace App\Services;

/**
 * Description of NewsDataIoService
 *
 * @author H1
 */
class NewsDataIoService
{

    public function downloadContentByCategoryUrlPage(string $categoryUrl, int $page = 1): array
    {
        try {
            $apiResponse = Http::get($categoryUrl, [
                'page' => $page
            ]);

            $result = [];
            if ($apiResponse->successful()) {
                $resultArr = $apiResponse->json();
                if (is_array($resultArr)) {
                    $result = $resultArr;
                }
            } else {
                // Записване на грешка в лог файл, без да се хвърля изключение
                Log::error("API request failed for URL: {$categoryUrl} with status code: " . $apiResponse->status());
            }
        } catch (\Exception $e) {
            // Улавяне на всякакви изключения и записването им в лог
            Log::error("Exception caught during API request to {$categoryUrl}. " . $e->getMessage());
        }
        
        return $result;
    }
}
