<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DecryptedText extends Component
{
    public $text;
    public $speed;

    public function __construct($text = null, $speed = 50)
    {
        $this->text = $text;
        $this->speed = $speed;
    }

    public function render(): View|Closure|string
    {
        return view('components.decrypted-text');
    }
}
