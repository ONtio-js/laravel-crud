<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $message;
    public function __construct($message = null)
    {
        //
        $this->message = $message;
    }

    public function backgroundCSS(){
        return [
            'error' => 'bg-red-400',
            'success' => 'bg-green-400',
            'warning' => 'bg-yellow-400'
        ][$this->type];
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
