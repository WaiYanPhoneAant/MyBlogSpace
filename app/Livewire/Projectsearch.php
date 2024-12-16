<?php

namespace App\Livewire;

use Livewire\Component;

class Projectsearch extends Component
{
    public  $keyword;
    public function render()
    {
        return view('livewire.projectsearch');
    }
    public function updatedKeyword(){
        $this->dispatch('search',$this->keyword);
    }
}

