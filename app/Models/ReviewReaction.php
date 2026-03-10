<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ReviewReaction extends Model
{
    /** @use HasFactory<\Database\Factories\ReviewReactionFactory> */
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
}
