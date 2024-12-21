<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class layout extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $style;
    public $description;
    public $featuredImage='';
    public function __construct($style, $title, $description, $featuredImage)
    {
       $this->style=$style;
       $this->title=$title;
         $this->description=$description;
            $this->featuredImage=$featuredImage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
