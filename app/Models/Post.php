<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;



class Post extends Model
{
    use HasFactory;
    use Sluggable;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true

            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }


    public function getGetExcerptAttribute()
    {

        #$converted = Str::substr('The Laravel Framework', 4, 7);

        return Str::substr($this->body, 0, 150);
    }
}
