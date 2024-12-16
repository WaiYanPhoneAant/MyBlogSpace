<?php

namespace App\Livewire;

use App\Models\project;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Lazy;
use Livewire\WithPagination;

#[Lazy]
class ProjectCards extends Component
{
    use WithPagination;
    public $keyword = '';
    public $loading = false;
    #[On('search')]
    public function updatekeyword($keyword)
    {
        $this->loading = true;
        $this->keyword = $keyword;
    }
    public function placeholder()
    {
        return view('components.lazyLoading.card');
    }
    public function render()
    {
        $projects = project::when($this->keyword, function ($q) {
            $q->where("name", 'LIKE', "%{$this->keyword}%");
        })->paginate(30);
        $this->loading = false;
        return view('livewire.project-cards', compact('projects'));
    }
}
