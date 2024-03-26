<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    // The relation to User model, table.
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function getUserCategories(): array
//    {
//        if (!auth()->check()) {
//            return [];
//        }
//
//        $userPreferences = $this->where('user_id', auth()->id())->first();
//
//        if (!$userPreferences) {
//            return [];
//        }
//
//        return $userPreferences->categories;
//    }

    public static function getUserCategories()
    {
        if (!auth()->check()) {
            return [];
        }

        $userPreferences = self::where('user_id', auth()->id())->first();

        if (!$userPreferences) {
            return [];
        }

        $categories = json_decode($userPreferences->categories, true);
        
        if (!is_array($categories)) {
            return [];
        }
        
        return $categories;
    }
}