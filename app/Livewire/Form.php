<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:50')]
    public string $name;
    #[Rule('required|email')]
    public string $email;
    #[Rule('required|min:6')]
    public string $password;

    public function render(): Factory|View|Application
    {
        $users = User::paginate(2);
        return view('livewire.form', [
            'users' => $users
        ]);
    }

    public function createNewUser(): void
    {
        $this->validate();
        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]
        );

        $this->reset(['name', 'email', 'password']);

        request()->session()->flash('success', 'User created successfully');
    }
}
