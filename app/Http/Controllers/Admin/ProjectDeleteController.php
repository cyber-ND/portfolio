<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class ProjectDeleteController extends Controller
{
    public function destroy(Project $project)
    {
        try {
            $title = $project->title;
            $project->delete();
            Log::info('Project deleted', ['title' => $title, 'user_id' => auth()->id()]);
            return redirect()->route('admin.cyber-dashboard')->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Project deletion error', ['error' => $e->getMessage()]);
            return redirect()->route('admin.cyber-dashboard')->withErrors(['error' => 'Failed to delete project.']);
        }
    }
}
?>