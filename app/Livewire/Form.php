<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Form extends Component
{

    public string $name;
    public string $email;
    public string $password;

    public function render(): Factory|View|Application
    {
        $users = User::all();
        return view('livewire.form', [
            'users' => $users
        ]);
    }

    public function createNewUser()
    {
        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]
        );
    }
}
