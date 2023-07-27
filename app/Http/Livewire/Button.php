<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Button extends Component
{
    public $button=false;
    public $acceuil=false;
    protected $listeners = [
        "message"=>"message1"
    ];
    public function message1($email)
    {

        $user = Admin::where("email",$email)->first();
        Admin::where("email",$email)->update(["ligne"=>false]);
        Auth::logout($user);
        return redirect()->to("/");
    }
    public function mount()
    {
        if(Route::is("connexion") OR Route::is("inscrire") OR Route::is("admin"))
        {
            $this->acceuil=true;
        }
        else{
            $this->acceuil=false;
        }
    }
    public function sortie($key)
    {
        $user=Admin::find($key);
        $this->button=false;
        $this->dispatchBrowserEvent("message",
            [
                "title"=>"Deconnection success <span class='bold-gray text-yellow-400'>@".$user->email."</span>",
                "email"=>$user->email,
                "position"=>"top",
                "toast"=>true
            ]);
    }
    public function button()
    {
        $this->button=!$this->button;
    }
    public function render()
    {
        return view('livewire.button');
    }
}
