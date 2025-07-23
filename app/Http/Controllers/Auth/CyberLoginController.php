<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CyberLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.cyber');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            $user = \App\Models\User::where('email', $request->email)->first();
            if (!$user) {
                Log::warning('User not found', ['email' => $request->email]);
                return back()->withErrors(['email' => 'No account found with this email.'])->withInput($request->only('email'));
            }

            if (Auth::attempt($credentials, true)) {
                Log::info('Authentication successful', ['user_id' => $user->id, 'email' => $user->email]);
                if ($user->hasRole('admin')) {
                    $request->session()->regenerate();
                    Log::info('Admin role confirmed, redirecting to cyber-dashboard');
                    return redirect()->route('admin.cyber-dashboard')->with('success', 'Login successful.');
                }
                Auth::logout();
                Log::warning('User does not have admin role', ['email' => $request->email]);
                return back()->withErrors(['email' => 'You are not authorized to access the admin dashboard.'])->withInput($request->only('email'));
            }
            Log::warning('Authentication failed', ['email' => $request->email]);
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput($request->only('email'));
        } catch (\Exception $e) {
            Log::error('Login exception', ['error' => $e->getMessage(), 'email' => $request->email]);
            return back()->withErrors(['email' => 'An error occurred. Please try again.'])->withInput($request->only('email'));
        }
    }
}
