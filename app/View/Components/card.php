<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $title;
    public $class;

    public function __construct($title, $class)
    {
        $this->title = $title;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
