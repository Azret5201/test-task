<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = ['original_url', 'short_url', 'visits'];

    public function users()
    {
        return $this->hasMany(User::class, 'url_id');
    }
}
