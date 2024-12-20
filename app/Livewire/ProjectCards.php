<?php

namespace App\Livewire;

use App\Models\Post;
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
    public $perPage = 30;
    protected $queryString = ['perPage'];

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
        $posts = Post::when($this->keyword, function ($q) {
            $q->where("title", 'LIKE', "%{$this->keyword}%");
        })->OrderBy('published_at', 'DESC')
            ->where('status','published')->paginate($this->perPage);
        $this->loading = false;
        return view('livewire.project-cards', compact('posts'));
    }
}
