<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectEditController extends Controller
{
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'link' => ['nullable', 'url'],
        ]);

        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
            ];

            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($project->image) {
                    Storage::disk('public')->delete($project->image);
                }
                $path = $request->file('image')->store('projects', 'public');
                $data['image'] = $path;
            }

            $project->update($data);
            Log::info('Project updated', ['title' => $project->title, 'user_id' => auth()->id()]);
            return redirect()->route('admin.cyber-dashboard')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            Log::error('Project update error', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to update project.'])->withInput();
        }
    }
}
