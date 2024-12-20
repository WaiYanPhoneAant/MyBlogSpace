<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryFilterComponent extends Component
{
    public $categories = [];
    public $category_id = 'all';
    public $category = 'all';
    public function mount()  {
        $this->categories = Category::all();
    }
    public $queryString = ['category_id','category'];
    public function clickCategory($category_id="all",$slug="all") {
        $this->category_id = $category_id;
        $this->category = $slug;
        $this->dispatch('clickCategory', $category_id,$slug);
    }
    public function render()
    {
        return view('livewire.category-filter-component');
    }
}
