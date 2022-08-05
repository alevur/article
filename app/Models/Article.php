<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    //заполняемы поля
    protected $fillable = ['title', 'body', 'img', 'slug'];

    //данная модель может иметь множество комментариев
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //взаимодествие с объектом статистики один к одному
    public function state()
    {
        return $this->hasOne(State::class);
    }

    //многие ко многим
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
