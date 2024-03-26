<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // The relation to Provider model, table.
    public function providers() {
        return $this->belongsToMany(Provider::class)->using(CategoryProvider::class)->withTimestamps();
    }
}