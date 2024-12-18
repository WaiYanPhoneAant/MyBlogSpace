<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\project;
use Livewire\Component;

class ProjectView extends Component
{
    public $slug;
    public function placeholder()
    {
        return view('components.lazyLoading.projectView');
    }
    public function render()
    {
        try {
            $post = Post::where('slug', $this->slug)->firstOrFail();
            return view('livewire.project-view', compact('post'));
        } catch (\Throwable $th) {
            return back();
        }
    }
}
