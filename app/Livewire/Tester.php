<?php
namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Tester extends Component
{
    #[Validate('required|string|min:3')]
    public $name = '';

    #[Validate('required|email')]
    public $email = '';


    public function updatedName(){
    }
    public function submitForm()
    {
        dump('submitted', $this->all());

        $this->validate();

        Log::info('Form submitted', ['name' => $this->name, 'email' => $this->email]);

        // Example action: Save to database or send an email
        // For demo purposes, we'll just flash a success message
        session()->flash('success', 'Form submitted successfully!');

        // Reset form fields after submission
        $this->reset(['name', 'email']);
    }

    public function render()
    {
        return view('livewire.tester');
    }
}