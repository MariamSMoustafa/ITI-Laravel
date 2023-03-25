<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable;
    


    protected $fillable = [
        'title',
        'description',
        'user_id',
        'slug',
        'image',

    ];

    public function user(){
        
        return $this->belongsTo(User::class);
    }


    public function comments(){
        return $this->morphMany(Comment::class,"commentable");
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
