<?php

namespace App\Livewire;
use App\Models\Project;

use Livewire\Component;

class SecretDashboard extends Component
{
    public $project_name;
    public $project_description;
    public $background_image_url;

    protected $rules = [
        'project_name' => 'required|string|max:255',
        'project_description' => 'required|string',
        'background_image_url' => 'required|url',
    ];

    public function mount()
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
    }

    public function createProject()
    {
        $this->validate();

        Project::create([
            'project_name' => $this->project_name,
            'project_description' => $this->project_description,
            'background_image_url' => $this->background_image_url,
        ]);

        $this->reset(['project_name', 'project_description', 'background_image_url']);
        session()->flash('success', 'Project created successfully.');
    }

    public function deleteProject($projectId)
    {
        Project::findOrFail($projectId)->delete();
        session()->flash('success', 'Project deleted successfully.');
    }
    public function render()
    {
        return view('livewire.secret-dashboard');
    }
}
