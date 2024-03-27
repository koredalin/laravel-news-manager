<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

        
    public const NEWS_API_ORG = 'NEWS_API_ORG';
    public const NEWS_DATA_IO = 'NEWS_DATA_IO';
    
    public const NEWS_API_ORG_KEY = 'NEWS_API_ORG_KEY';
    public const NEWS_DATA_IO_KEY = 'NEWS_DATA_IO_KEY';
    
    public const API_NAMES = [
        self::NEWS_API_ORG,
        self::NEWS_DATA_IO,
    ];

    public const API_KEYS = [
        self::NEWS_API_ORG_KEY,
        self::NEWS_DATA_IO_KEY,
    ];

    // The relation to Category model, table.
    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryProvider::class)->withTimestamps();
    }
}