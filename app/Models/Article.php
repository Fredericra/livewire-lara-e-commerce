<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Favori;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ["model","descipt","nom","prix","stock","billet","emploi","pub","offre","autre","admin_id"];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function image()
    {
        return $this->belongsTo(Image::class,'article_id');
    }
    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }
    public function favori()
    {
        return $this->HasOne(Favori::class);
    }

}
