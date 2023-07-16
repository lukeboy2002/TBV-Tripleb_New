<?php

namespace App\View\Components;

use App\Models\Slide;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $slides = Slide::where('active', 1)->get();

        return view('components.slider', [
            'slides' => $slides,
        ]);
    }
}
