<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageURI extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'is_cover',
        'uri',
    ];

    public function article(): BelongsTo {
        return $this->belongsTo(Article::class);
    }
}
