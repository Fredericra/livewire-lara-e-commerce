<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Favori;
use App\Models\Param;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Left extends Component
{
    public $tsena=false;
    public $pub=false;
    public $offre=false;
    public $emploi=false;
    public $moi;
    public $article;
    public $message=[];
    public $notification=false;
    public $premuim =false;
    public $affiche=false;
    protected $listeners =[
        "notif"=>"notif2",
        "notif1"=>"notif1"
    ];
    public function notif1()
    {
        
    }
    public function notif2($article,$true,$user)
    {
        $this->notification=true;
        if($user===Auth::id())
        {
            $articles=Article::find($article);
           if($articles->admin_id===Auth::id() AND $user===Auth::id())
           {
            if($true)
            {
                $this->message="vous aime votre article";
            }
            else{
                $this->message="vous retire votre favoris";
            }
           }
           else
           {
            if($true)
            {
                $this->message="vous aime une publication <span class='text-blue-400 cursor-pointer'</span>";
            }
            else{
                $this->message="vous retire favori publication de <span class='text-blue-400 cursor-pointer'>@</span>";

            }
           }
           
        }

    }
    public function affiche()
    {
        $this->affiche=!$this->affiche;
    }
    public function check($type,$value)
    {
        $user=Admin::find(Auth::id());
        if($user->param()->where("admin_id",Auth::id())->exists())
        {
            Param::where("admin_id",Auth::id())->update([$type=>$value]);
        }
        else
        {
           Param::create([
            "admin_id"=>Auth::id(),
            $type=>$value
        ]);
        }
    }
    public function etsena()
    {
        $this->emit("etsena");
    }
    public function tsena()
    {
         $this->tsena=!$this->tsena;
         $this->check("tsena",$this->tsena);
       
    }
    public function pub()
    {
        $this->pub=!$this->pub;
        $this->check("pub",$this->pub);
    }
    public function offre()
    {
        $this->offre=!$this->offre;
        $this->check("autre",$this->offre);
    }
    public function emploi()
    {
        $this->emploi=!$this->emploi;
        $this->check("emploi",$this->emploi);
    }
    public function premuim()
    {
       $this->premuim=!$this->premuim;
       $this->check("premuim",$this->premuim);

    }
    public function render()
    {
     
        $param=Param::where("admin_id",Auth::id())->first();
        if(empty($param))
        {

        }else{
        $this->tsena=$param->tsena;
        $this->premuim=$param->premuim;
        $this->premuim=$param->premuim;
        $this->offre=$param->autre;
        $this->pub=$param->pub;
        }

           if($this->premuim)
        {
            $this->emit("premuim1",true);
        }
        else{
            $this->emit("premuim1",false);
        }
        return view('livewire.left');
    }
}
