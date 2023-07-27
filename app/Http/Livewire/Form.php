<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $form=false;
     public $nom;
    public $model;
    public $stock;
    public $prix;
    public $file;
    public $billet;
    public $descipt;
    protected $listeners = 
    [
        "etsena"=>"etsena1",
        "form"=>"form"
    ];
     protected $rules = 
    [
        "nom"=>"required",
        "model"=>"required",
        "prix"=>"required|integer",
        "stock"=>"required|integer",
        "billet"=>"required",
        "descipt"=>"required|min:12",

    ];
    public function form()
    {
        $this->form=true;
    }

     public function updated($fiels)
    {
        if($this->form)
        {
            $this->validateOnly($fiels,$this->rules);
        }
    }
     public function article()
    {
        
        $this->validate();
        $article = Article::create([
           "model"=>"!".$this->model,
           "descipt"=>nl2br(htmlentities($this->descipt)),
           "nom"=>$this->nom,
           "stock"=>$this->stock,
           "billet"=>$this->billet,
           "autre"=>true,
           "prix"=>$this->prix,
           "admin_id"=>Auth::id()
        ]);
      $image= $this->file->storePublicly("article","public");
      $article->images()->create(
        [
            "image"=>$image,
        ]);
      $this->dispatchBrowserEvent("creer");

    }
    
    public function etsena1()
    {
        $this->form=true;
    }
    public function closeTsena()
    {
        $this->form=false;
    }
    public function render()
    {
        return view('livewire.form');
    }
}
