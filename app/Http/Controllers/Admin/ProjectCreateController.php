<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectCreateController extends Controller
{
    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
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
                $path = $request->file('image')->store('projects', 'public');
                $data['image'] = $path;
            }

            Project::create($data);
            Log::info('Project created', ['title' => $request->title, 'user_id' => auth()->id()]);
            return redirect()->route('admin.cyber-dashboard')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            Log::error('Project creation error', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to create project.'])->withInput();
        }
    }
}
