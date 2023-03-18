<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $href;

    public function __construct($type,$href='')
    {
        $this->type = $type;
        $this->href = $href;
    }

    public function render()
    {
        return view('components.button');
    }
}
