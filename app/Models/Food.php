<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


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

    public function coverImageUrl($conversion = 'preview'): string
    {
        $media = $this->media->first();

        if ($media) {
            return $media->getUrl($conversion);
        }

        return asset('img/defaults/food.jpg');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400)
            ->height(300)
            ->fit(Fit::Crop, 400, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('large')
            ->width(400)
            ->height(300)
            ->fit(Fit::Max, 100, 500)
            ->nonQueued();
    }
}
