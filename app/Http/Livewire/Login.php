<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'กรุณากรอกอีเมล',
        'email.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
        'password.required' => 'กรุณากรอกรหัสผ่าน'
    ];

    public function submit()
    {
        $this->validate();

        if (Auth::guard('personnel')->attempt(array('email' => $this->email, 'password' => $this->password))) {
            $this->redirectToDashboard();
        }

        session()->flash('status', 'error');
        session()->flash('message', 'ไม่สามารถเข้าสู่ระบบได้');

    }

    public function redirectToDashboard(): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        return redirect(route('auth.dashboard'));
    }
}
