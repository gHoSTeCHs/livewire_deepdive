<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Clicker extends Component
{
    public int $count = 0;
    public function render(): Factory|View|Application
    {
        return view('livewire.clicker');
    }

    public function increment(): void
    {
        $this->count++;
    }
    public function decrement(): void
    {
        $this->count--;
    }
}
