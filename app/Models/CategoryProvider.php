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
        return self::whereIn('category_id', $categoryIds)
            ->pluck('source_url')
            ->toArray();
    }
}
