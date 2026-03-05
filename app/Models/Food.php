<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Food extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }
}
