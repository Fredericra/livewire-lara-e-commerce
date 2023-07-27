<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;
    protected $fillable = ["heart","aime","naime","meme","article_id","admin_id"];
    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
