<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $username;
    public $password;
    public $remember = false;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'username' => $this->username,
            'password' => $this->password,
        ], $this->remember)) {
            session()->regenerate();
            return redirect()->route('home');
        }

        $this->addError('username', 'Username atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login')
        ->layout('components.layouts.app', [
            'title' => 'JoyFinory - Masuk'
        ]);;
    }
}
