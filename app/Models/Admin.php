<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Favori;
use App\Models\Param;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as Admins;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Admins
{
    use HasFactory,Authenticatable;
    protected $fillable = ["pseudo","email","password"];
    public function param()
    {
        return $this->hasMany(Param::class);
    }
     public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }
   

}
