<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Description of CategoryProvider
 *
 * @author H1
 */
class CategoryProvider extends Pivot
{
    public $timestamps = true;

    public static function getLinksByCategoryIds(array $categoryIds)
    {
        $urls = self::whereIn('category_id', $categoryIds)->get(['category_id', 'source_url']);

        $result = [];
        foreach ($urls as $url) {
            $result[$url->category_id][] = $url->source_url;
        }

        return $result;
        
        
//        return array(
//            'https://newsapi.org/v2/top-headlines?category=health',
//            'https://newsdata.io/api/1/sources?category=health'
//        );
    }
}
