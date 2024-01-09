<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "intro", "detailsOne", "detailsTwo", "detailsThree", "featuredImage", "thumbnail", "image", "video", "link", "category", "featured"
    ];

    protected $appends = [
        'comments'
    ];

    public function getCommentsAttribute()
    {
        // Your logic to retrieve and return comments here
        return Comment::where('blog_id', $this->id)->get();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
