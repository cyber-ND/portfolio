<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CyberLoginController;
use App\Http\Controllers\Admin\CyberDashboardController;
use App\Http\Controllers\Admin\ProjectCreateController;
use App\Http\Controllers\Admin\ProjectEditController;
use App\Http\Controllers\Admin\ProjectDeleteController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/cyber-dashboard', [CyberDashboardController::class, 'index'])->name('cyber-dashboard');
    Route::get('/projects/create', [ProjectCreateController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectCreateController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectEditController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectEditController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectDeleteController::class, 'destroy'])->name('projects.destroy');
});

Route::get('/cyber', [CyberLoginController::class, 'showLoginForm'])->name('admin.cyber');
Route::post('/cyber', [CyberLoginController::class, 'login'])->name('admin.cyber.post');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home')->with('success', 'Logged out successfully.');
})->name('logout');
?>