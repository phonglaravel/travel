<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CommentBlog extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'comment_blog';
    public function comment_comment() {
        return $this->hasMany(CommentComment::class,'commentblog_id')->orderBy('id','DESC');
    }
}
