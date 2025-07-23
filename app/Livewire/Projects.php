<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class Projects extends Component
{
    public function render()
    {
        return view('livewire.projects', ['projects' => Project::all()]);
    }
}