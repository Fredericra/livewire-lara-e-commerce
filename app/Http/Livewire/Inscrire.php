<?php

namespace App\Http\Livewire;

use App\Models\Admin as IsAdmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Authorize;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Inscrire extends Component
{
     public $eye = false;
    public $eye1 = false;
    public $email;
    public $pseudo;
    public $confirm;
    public $password;
    public $check;
    public $button=false;
    public function check()
    {
        if($this->check)
        {
            $this->button=false;
        }
        else{
           $this->button=true;
        }
    }
    protected $listeners = [
        "inscrire"=>"message1"
    ];
    public function message1($email)
    {
        $user=IsAdmin::where("email","*".$email)->update(["ligne"=>true]);
        $admin=IsAdmin::where("email","*".$email)->first();
        Authorize::login($admin);
        return Redirect()->to("/");
    }
    public function updated($fiels)
    {
        $this->validateOnly($fiels,[
            "pseudo"=>"required|unique:users",
            "email"=>"required|email|unique:users",
            "password"=>["required","min:6","max:16",Password::min(8)
            ->letters()
            ->numbers()
            ->mixedCase()],
            "confirm"=>"required|same:password"
        ]);
    }
    public function inscrire()
    {
       $this->validate(
        [
            "pseudo"=>"required|unique:users",
            "email"=>"required|email|unique:users",
            "password"=>["required","min:6","max:16",Password::min(8)
            ->letters()
            ->numbers()
            ->mixedCase()],
            "confirm"=>"required|same:password"

        ]);
       $user = IsAdmin::create([
        "pseudo"=>"@".$this->pseudo,
        "email"=>"*".$this->email,
        "password"=>Hash::make($this->password),
       ]);
       $this->dispatchBrowserEvent("inscrire",
        [
            "title"=>"attend une quelque seconde <span class='bold-amber' >{$this->email} !</span>",
            "position"=>"top",
            "toast"=>"true",
            "email"=>$this->email,
        ]);
    }
    public function eye()
    {
        $this->eye=!$this->eye;
    }
    public function eye1()
    {
        $this->eye1=!$this->eye1;
    }
    public function render()
    {
        $this->check();
        return view('livewire.inscrire');
    }
}
