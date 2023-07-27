<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["comment","admin_id","article_id","image"];
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
    public function article()
    {
        return $this->hasOne(Article::class);
    }
    public function admins()
    {
        return $this->belongsTo(Admin::class,"admin_id");
    }
    public function articles()
    {
        return $this->belongsTo(Article::class,"article_id");
    }

}
