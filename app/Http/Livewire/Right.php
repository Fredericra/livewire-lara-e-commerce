<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Right extends Component
{
    public $premuim1 =true;
    public $premuim=false;  
    protected $listeners = [
        "premuim1"=>"premuim"
    ];
    public function premuim($tatue)
    {
        $this->premuim1=$tatue;
    }
    public function render()
    {
        return view('livewire.right',["premuim"=>$this->premuim1]);
    }
}
