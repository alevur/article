<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['likes', 'views', 'article_id'];
    //Доставать статистику из статьи

    public $timestamps = false;
}
