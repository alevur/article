<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body', 'article_id'];

    //комментарий относится к статье
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
