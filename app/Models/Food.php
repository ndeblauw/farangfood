<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Food extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\FoodFactory> */
    use HasFactory;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $guarded = [];

    public function shops()
    {
        return $this->belongsToMany(Shop::class);
    }

    public function coverImageUrl(string $conversion = 'cover-image'): string
    {
        $media = $this->media->first();

        if ($media) {
            return $media->getUrl($conversion);
        }

        return asset('img/defaults/food.jpg');
    }

    public function bannerImageUrl(): string
    {
        return $this->coverImageUrl('banner');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('cover-image')
            ->width(480)
            ->height(320)
            ->fit(Fit::Crop, 480, 320)
            ->nonQueued();

        $this
            ->addMediaConversion('banner')
            ->width(1600)
            ->height(320)
            ->fit(Fit::Crop, 1600, 320)
            ->nonQueued();
    }
}
