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
}