<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Article as Outils;
use App\Models\Comment;
use App\Models\Favori;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Article extends Component
{
    public $comment;
    public $heart =false;
    public $tous= [];
    public $mention= [];
    public $menuKey="";
    public $affiche;
    public $buy=false;
    public $show = false;
   public function show($cle)
   {
    $this->menuKey=$cle;
    $this->show=!$this->show;
   }
   public function affiche($affiche)
   {
    $this->menuKey=$affiche;
    $this->affiche=!$this->affiche;
    $this->tous =Comment::with(["admins","articles"])
    ->where("article_id",$affiche)
    ->orderBy("id","desc")
    ->get();
   }
   public function heart($heart)
   {
    $this->heart=!$this->heart;
    $article = Outils::find($heart);
    if($article->favoris()
        ->where(
            ["article_id"=>$heart,"admin_id"=>Auth::id()])
        ->first())
    {
        $favoris = Favori::where(
            ["article_id"=>$heart,"admin_id"=>Auth::id()])
        ->delete();
        $select= Favori::where(
            ["article_id"=>$heart,"admin_id"=>Auth::id()])
        ->first();
        $valide=empty($select)?false:true;
        $this->emit("notif",$heart,$valide,Auth::id());
    }
    else
    {
        Favori::create([
            "article_id"=>$heart,
            "admin_id"=>Auth::id(),
            "heart"=>true
        ]);
        $this->emit("notif",$heart,true,Auth::id());


    }
   }
   public function buy($buy)
   {
    $this->menuKey=$buy;
    $this->buy=!$this->buy;
   }
   public function comment($comment)
   {


    Comment::create([
        "comment"=>$this->comment,
        "admin_id"=>Auth::id(),
        "article_id"=>$comment,
    ]);
    $this->emit("notif1",$comment,Auth::id());
    $this->reset();
   }
  
   public function message($value)
   {
    return "<span class='st-icon-pandora'>".$value."</span>";
   }
  public function updatedComment($value)
  {
    if(isset($value) and !empty($value))
    {
       $pseudo=Admin::where("pseudo","like","%".$value."%")->get();
       $this->mention=$pseudo; 
    }
    else{
    $this->mention=[];        
    }
  }
  public function trouve($emal)
  {
    dd($emal);
  }
  public function retrouve($key)
  {
    $keys=str_replace("_"," " ,$key);
    $user=Admin::where("pseudo",$keys)->first();
    if(isset($user) and !empty($user))
    {
        return $user["pseudo"];
    }
    return 0;
  }
    public function render()
    {
        $article = Outils::with(["images","admin","favoris"])
        ->orderBy("id","desc")
        ->get();
        $patter= 
        [
            "/#[a-zA-Z0-9_]+/ "=>function($match)
            {
                return "<button class='font-bold text-violet-400' wire:click.prevent='trouve({{$this->retrouve($match[0])  }})'>".$match[0]."</button>";
            },
            "#![0-9 ]+#"=>function($match)
            {
                return "<button class='bold-gray hover:bold-white px-4 text-xl' wire:click.prevent='user({$match[0]}) '>".str_replace("!", "", $match[0])."</button>";
            }

        ];
        $articles =json_decode(preg_replace_callback_array($patter,$article));
        if(!empty($this->tous))
        {
             $tour=json_decode(preg_replace_callback_array($patter, $this->tous));
        
        }
       
        return view('livewire.article',
            [
                "tout"=>isset($tour)?$tour:null,
                "article"=>$articles
            ]);
    }
}
