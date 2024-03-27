<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public const API_NAMES = [
        'NEWS_API_ORG',
        'NEWS_DATA_IO',
    ];

    public const API_KEYS = [
        self::API_NAMES[0] . '_KEY',
        self::API_NAMES[1] . '_KEY',
    ];

    // The relation to Category model, table.
    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryProvider::class)->withTimestamps();
    }
}