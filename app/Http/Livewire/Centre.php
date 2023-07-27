<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Centre extends Component
{
    use WithFileUploads;
    // formulaire
    public $code;
    public $compte;
    public $check;
   

    //fin
   
    public $premuim=false;
    public $etsena=false;
   
    protected $listeners = 
    [
        "premuim1"=>"premuim",
        "etsena"=>"etsena1"
    ];
   
    public function closeTsena()
    {
        $this->etsena=false;
    }
    public function etsena1()
    {
        $this->etsena=true;
    }

     public function premuim2()
    {

    }
   
    public function premuim($statue)
    {
        $this->premuim=$statue;
    }
    public function close()
    {
        $this->premuim=true;   
    }
    public function render()
    {
        $article=Article::with(["image"])
        ->orderBy("id","desc")
        ->get();
        return view('livewire.centre',
            ["article"=>$article]);
    }
}
