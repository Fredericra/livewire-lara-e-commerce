<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LeftCreation extends Component
{
    public function etsena()
    {
        $this->emit("etsena");
    }
    public function render()
    {
        return view('livewire.left-creation');
    }
}
