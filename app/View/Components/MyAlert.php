<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MyAlert extends Component
{
    public string $type;
    public string $alertTitle;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type, string $alertTitle)
    {
        $this->type = $type;
        $this->alertTitle = $alertTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.my-alert');
    }
}
