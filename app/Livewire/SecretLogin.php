<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Layout;

use Livewire\Component;
#[Layout('components.layouts.app')]

class SecretLogin extends Component
{
    // #[Validate('required|email')]
   #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';



    public function mount(){
    }


public function updatedEmail(){
    dd($this->email);
}


    public function loginUser()
    {
        dump('ji',$this->all());
        // $this->validate();

        Log::info('Login attempt started', ['email' => $this->email]);

        try {
            $user = \App\Models\User::where('email', $this->email)->first();
            if (!$user) {
                Log::warning('User not found', ['email' => $this->email]);
                $this->addError('email', 'No account found with this email.');
                session()->flash('error', 'No account found with this email.');
                $this->reset('password');
                return;
            }

            if (Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
                Log::info('Authentication successful', ['user_id' => $user->id, 'email' => $user->email]);
                if ($user->hasRole('admin')) {
                    session()->regenerate();
                    Log::info('Admin role confirmed, redirecting to admin.dashboard');
                    session()->flash('success', 'Login successful.');
                    return redirect()->route('admin.dashboard');
                }
                Auth::logout();
                Log::warning('User does not have admin role', ['email' => $this->email]);
                $this->addError('email', 'You are not authorized to access the admin dashboard.');
                session()->flash('error', 'You are not authorized to access the admin dashboard.');
            } else {
                Log::warning('Authentication failed', ['email' => $this->email]);
                $this->addError('email', 'Invalid email or password.');
                session()->flash('error', 'Invalid email or password.');
            }
        } catch (\Exception $e) {
            Log::error('Login exception', ['error' => $e->getMessage(), 'email' => $this->email]);
            $this->addError('email', 'An error occurred. Please try again.');
            session()->flash('error', 'An error occurred. Please try again.');
        }

        $this->reset('password');
    }

    public function render()
    {
        return view('livewire.secret-login');
    }
}
