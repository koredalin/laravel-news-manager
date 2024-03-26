<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class NewsLoaderService
{
    public function downloadContentByCategoryId(int $categoryId): string
    {
        return DB::table('skills')->get();
    }
}