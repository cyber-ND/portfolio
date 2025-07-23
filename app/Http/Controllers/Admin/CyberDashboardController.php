<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Log;

class CyberDashboardController extends Controller
{
    public function index()
    {
        try {
            $projects = Project::all();
            Log::info('Cyber dashboard accessed', ['user_id' => auth()->id()]);
            return view('admin.cyber-dashboard', compact('projects'));
        } catch (\Exception $e) {
            Log::error('Dashboard access error', ['error' => $e->getMessage()]);
            return redirect()->route('admin.cyber')->withErrors(['error' => 'An error occurred accessing the dashboard.']);
        }
    }
}
