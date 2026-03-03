<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'shop_id', 'id');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
    //
}
