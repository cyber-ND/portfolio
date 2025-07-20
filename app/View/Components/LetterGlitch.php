<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LetterGlitch extends Component
{
    public $centerVignette;
    public $outerVignette;

    public function __construct($centerVignette = false, $outerVignette = true)
    {
        $this->centerVignette = $centerVignette;
        $this->outerVignette = $outerVignette;
    }

    public function render(): View|Closure|string
    {
        return view('components.letter-glitch');
    }
}
