<?php

namespace App\Livewire;
use App\Models\Project;

use Livewire\Component;

class EditProject extends Component
{
    public $project;
    public $project_name;
    public $project_description;
    public $background_image_url;

    protected $rules = [
        'project_name' => 'required|string|max:255',
        'project_description' => 'required|string',
        'background_image_url' => 'required|url',
    ];

    public function mount($projectId)
    {
        if (!auth()->user()->is_admin) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $this->project = Project::findOrFail($projectId);
        $this->project_name = $this->project->project_name;
        $this->project_description = $this->project->project_description;
        $this->background_image_url = $this->project->background_image_url;
    }

    public function updateProject()
    {
        $this->validate();

        $this->project->update([
            'project_name' => $this->project_name,
            'project_description' => $this->project_description,
            'background_image_url' => $this->background_image_url,
        ]);

        session()->flash('success', 'Project updated successfully.');
        return redirect()->route('admin.dashboard');
    }
    public function render()
    {
        return view('livewire.edit-project');
    }
}
