<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\NewsCacheService;
use stdClass;

class NewsCacheServiceTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function it_serializes_content_correctly()
    {
        $newsCacheService = new NewsCacheService();
        $provider = 'testProvider';
        $catId = 1;
        $page = null;
        $timestamp = time();
        $content = new stdClass();
        $content->data = 'Test data';

        $tempCachePath = sys_get_temp_dir();
        $newsCacheService->setCachePath($tempCachePath);

        $newsCacheService->serialize($provider, $catId, $page, $timestamp, $content);

        $expectedFilePath = $tempCachePath . "/cache_{$provider}_cat_{$catId}_page_{$page}_{$timestamp}.txt";
        $this->assertFileExists($expectedFilePath);
        $this->assertEquals(json_encode($content), file_get_contents($expectedFilePath));

        @unlink($expectedFilePath);
    }

    /** @test */
    public function it_unserializes_content_correctly()
    {
        $newsCacheService = new NewsCacheService();
        $provider = 'testProvider';
        $catId = 1;
        $page = null;
        $content = new stdClass();
        $content->data = 'Test data';

        $tempCachePath = sys_get_temp_dir();
        $newsCacheService->setCachePath($tempCachePath);
        $timestamp = time();
        $newsCacheService->serialize($provider, $catId, $page, $timestamp, $content);

        $unserializedContent = $newsCacheService->unserialize($provider, $catId, $page);
        $this->assertEquals($content, $unserializedContent);

        $expectedFilePath = $tempCachePath . "/cache_{$provider}_cat_{$catId}_page_{$page}_{$timestamp}.txt";
        @unlink($expectedFilePath);
    }
}
