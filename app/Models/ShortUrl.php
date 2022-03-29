<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    protected $appends = ['s_url'];

    public function getSUrlAttribute()
    {
        return env('APP_URL', url('/')) . '/' . $this->key;
    }

    public function short_url()
    {
        return env('APP_URL', url('/')) . '/' . $this->key;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
