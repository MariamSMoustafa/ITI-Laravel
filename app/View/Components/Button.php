<?php

namespace App\View\Components;


use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.button');
    }
}
