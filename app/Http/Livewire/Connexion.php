<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Connexion extends Component
{
    public $eye=false;
    public $email;
    public $password;
    public $check;
    public $button1=true;
    protected $rules = [
        "email"=>"required|email",
        "password"=>"required"
    ];
    protected $listeners = [
        "connexion"=>"message2"
    ];
    public function message2($email)
    {
        $user=Admin::where("email",$email)->update(["ligne"=>true]);
        $admin = Admin::where("email",$email)->first();
        Auth::login($admin);
        return redirect()->route("compte");
    }
  
    public function check()
    {
        if($this->check)
        {
            $this->button1=false;
        }
        else{
            $this->button1=true;
        }
    }
    public function eye()
    {
        $this->eye=!$this->eye;
    }
    public function updated($fields)
    {
        $this->check();
        $this->validateOnly($fields,$this->rules);
    }

    public function connexion()
    {
        $this->validate();
        if(Auth::attempt(["email"=>"*".$this->email,"password"=>$this->password]))
        {
            $this->dispatchBrowserEvent("connexion",
        [
            "title"=>"attend une quelque seconde <span class='bold-amber' >{$this->email} !</span>",
            "position"=>"top",
            "toast"=>"true",
            "email"=>"*".$this->email,
        ]);
        }
        else{
        if(!Admin::where("email","*".$this->email)->first())
        {
            $this->addError("email","email n'exists pas !");
        }    
        else{
            $this->addError("password","mots de pass incorrect");
        }
        }
    }
    public function render()
    {
        $this->check();
        return view('livewire.connexion');
    }
}
