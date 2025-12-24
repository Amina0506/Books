<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }

    protected $fillable = [
        'title',
        'author',
        'cover_image',
        'description',
        'for_you_reason',
    ];


}
