<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Avatar extends Component
{
    public $user, $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user = null, $width = null)
    {
        $this->user = $user ?? auth()->user();

        $this->width = $width;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.avatar');
    }
}
