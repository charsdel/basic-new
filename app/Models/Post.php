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


    //asignacion de datos de forma masiva esto en el caso del formulario
    //de esa manera estan filtrados y no se pueden inyectar datos al azar
    protected $fillable = [
        'title',
        'body',
        'iframe',
        'image',
        'user_id'
    ];


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
