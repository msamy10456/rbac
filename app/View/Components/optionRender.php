<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class optionRender extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $getId,
        public $putId,
        public $route,
        public $selectPicker = '1',
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.option-render');
    }
}
