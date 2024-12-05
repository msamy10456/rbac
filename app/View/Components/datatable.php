<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Datatable extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $columns;
    public $tableId;
    public $footer ;

    public function __construct($url,$columns,$tableId,$footer = '')
    {
        $this->url=$url;
        $this->columns=$columns;
        $this->tableId=$tableId;
        $this->footer=$footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatable');
    }
}
