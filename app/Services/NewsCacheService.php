<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Exceptions\SerializationException;
use stdClass;

/**
 * Description of NewsCacheService
 *
 * @author H1
 */
class NewsCacheService
{
    // Max single cache file use time
    public const MAX_USE_TIME = 6 * 60 * 60;

    /**
     * Our news cache directory is "/database/cache/news".
     * We access it with database_path('cache/news').
     */
    protected const DATABASE_FILE_PATH = 'cache/news';

    private string $cachePath;

    public function __construct()
    {
        $this->cachePath = database_path('cache'.DIRECTORY_SEPARATOR.'news') . DIRECTORY_SEPARATOR;
    }

    public function serialize(string $provider, int $catId, ?int $page, int $timestamp, stdClass $content): void
    {
        $fileName = $this->assembleFileName($provider, $catId, $page, $timestamp);
        
        try {
            $filePath = $this->cachePath . $fileName;

            $result = file_put_contents($filePath, serialize($content));

            if ($result === false) {
                throw new SerializationException("Failed to save the file: " . $filePath);
            }
        } catch (SerializationException $e) {
             Log::error("An error occurred while saving a file. " . $e->getMessage());
        }
    }

    public function unserialize(string $provider, int $catId, ?int $page): ?stdClass
    {
        $cacheFiles = glob($this->cachePath . $this->assembleFileName($provider, $catId, $page, '*'));
        $latestFile = end($cacheFiles);

        if ($latestFile) {
            $fileNameArr = explode('_', $latestFile);
            $fileTimestamp = (int) str_replace('.txt', '', end($fileNameArr));
            if (time() - $fileTimestamp < self::MAX_USE_TIME) {
                $content = unserialize($this->readFile($latestFile));
                if (!empty($content)) {
                    return $content;
                }
            } else {
                $this->deleteAllFiles($cacheFiles);
            }
        }

        return null;
    }

    public function setCachePath(string $cachePath): void
    {
        $this->cachePath = $cachePath;
    }

    private function readFile(string $filePath): string
    {
        try {
            $content = file_get_contents($filePath);
            if ($content === false) {
                throw new SerializationException("Failed to read file: {$filePath}");
            }
        } catch (SerializationException $e) {
            Log::error("Error reading cache file: " . $e->getMessage());
            
            return '';
        }
        
        return $content;
    }

    private function assembleFileName(string $provider, int $catId, ?int $page, string|int $timestamp): string
    {
        return strtolower('cache_' . $provider . '_cat_' . $catId . '_page_' . $page . '_' . $timestamp . '.txt');
    }

    private function deleteAllFiles(array $fileNames): void
    {
        foreach ($fileNames as $file) {
            $filePath = $this->cachePath . $file;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
}
