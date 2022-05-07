<?php

namespace App\Models;

use BeyondCode\Comments\Traits\HasComments;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory, HasTags, HasComments, Likeable;

    protected $fillable = [
        'title', 'slug', 'content', 'image', 'user_id',
    ];

    protected $hidden = [
        'user_id', 'id',
    ];

    // change timestamp created_at and updated_at to carbon human readable
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // create method for attaching tags to a post
    public function attachTags($tags)
    {
        $this->tags()->attach($tags);
    }
}