<?php

namespace App\View\Components\Notification;

use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Message
     *
     * @var string
     */
    public $message;

    /**
     * Color
     *
     * @var string
     */
    public $type;

    /**
     * Delay time
     *
     * @var int
     */
    public $delay;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = '', $type = 'success', $delay = 5000)
    {
        $this->message = session('message') ?? $message;
        $this->type = session('type') ?? $type;
        $this->delay = session('delay') ?? $delay;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification.toast');
    }
}
