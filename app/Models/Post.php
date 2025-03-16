<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable ;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'image'
    ];


    protected static function booted()
    {
        static::updating(function ($post) {
            // If image is being changed and there was an old image, delete it
            if ($post->isDirty('image') && $post->getOriginal('image')) {
                Storage::delete($post->getOriginal('image'));
            }
        });

        static::deleted(function ($post) {
            // If the post is being force deleted, remove the image
            if (!$post->isForceDeleting()) {
                return;
            }
            
            if ($post->image) {
                Storage::delete($post->image);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postCreator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
