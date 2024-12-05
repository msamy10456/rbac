<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formRequest extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $form =null,
        public $route =null,
        public $message =null,
        public $reload =false,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-request')->with(
            [
                'form'=>$this->form,
                'route'=>$this->route,
                'message'=>$this->message,
                'reload'=>$this->reload,
            ]);
    }
}
