<div >
    <form wire:submit="createNewUser" class="flex flex-col gap-5">
        <div>
            <label for="name">Name</label>
            <input class="rounded-md" wire:model="name" name="name" id="name" type="text"/>
        </div>

        <div>
            <label for="email">email</label>
            <input class="rounded-md" wire:model="email" name="email" id="email" type="text"/>
        </div>

        <div>
            <label for="password">Password</label>
            <input class="rounded-md" wire:model="password" name="password" id="password" type="password"/>
        </div>

        <button type="submit">Submit</button>
    </form>

    <div>
        @foreach($users as $user)
            <p>{{$user->name}}</p>
        @endforeach
    </div>
</div>