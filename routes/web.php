<?php

// use App\Livewire\Settings\Appearance;
// use App\Livewire\Settings\Password;
// use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WebController;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Projects;
use App\Livewire\Contact;
use App\Livewire\SecretLogin;
use App\Livewire\Tester;
use App\Livewire\SecretDashboard;
use App\Livewire\EditProject;

require base_path('./routes/admin.php');
Route::get('/', Home::class)->name('home');
Route::get('/about', About::class)->name('about');
Route::get('/projects', Projects::class)->name('projects');
Route::get('/contact', Contact::class)->name('contact');
Route::get('fish', [WebController::class, 'fish']);
// Route::get('/secret-login', SecretLogin::class)->name('secret-login');
Route::get('/test-login', Tester::class)->name('tester');

// 🔐 Admin routes using Spatie role middleware
// Route::get('/secret-admin', SecretDashboard::class)
//     ->name('admin.dashboard')
//     ->middleware(['auth', 'role:admin']);

// Route::get('/projects/{project}/edit', EditProject::class)
//     ->name('admin.projects.edit')
//     ->middleware(['auth', 'role:admin']);

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect()->route('home');
// })->name('logout');


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

require __DIR__.'/auth.php';
