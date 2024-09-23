<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|max:200|min:2')]
    public string $name = '';
    public string $search = '';

    public int $editingTodoId;
    #[Rule('required|max:200|min:2')]
    public string $editingTodoName;

    public function render(): Factory|View|Application
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(10)
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function create(): void
    {
        $attributes = $this->validateOnly('name');

        Todo::create($attributes);
        $this->reset(['name']);

        request()->session()->flash('success', 'Todo added successfully');
        $this->resetPage();
    }

    public function toggle(Todo $todo): void
    {
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit(Todo $todo): void
    {
        $this->editingTodoId = $todo->id;
        $this->editingTodoName = $todo->name;
    }

    public function cancel(): void
    {
        $this->reset(['editingTodoId',
            'editingTodoName']);
    }

    /**
     * @throws ValidationException
     */
    public function update(Todo $todo): void
    {
        $this->validateOnly('editingTodoName');
        $todo->update([
            'name' => $this->editingTodoName
        ]);

        $this->cancel();
    }

    public function delete(Todo $todo): void
    {
        $todo->delete();
    }
}
