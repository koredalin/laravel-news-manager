<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    
    public function getNewsApiOrgKey(): string
    {
        return env('NEWS_API_ORG_KEY', '');
    }
    
    public function getNewsDataIoKey(): string
    {
        return env('NEWS_DATA_IO_KEY', '');
    }

    // The relation to Category model, table.
    public function categories() {
        return $this->belongsToMany(Category::class)->using(CategoryProvider::class)->withTimestamps();
    }
}