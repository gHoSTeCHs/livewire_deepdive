<div>
    @if(session('success'))
        <p class="text-blue-700 text-sm italic">{{session('success')}}</p>
    @endif
    <form wire:submit="createNewUser" class="flex flex-col gap-5">
        <div>
            <label for="name">Name</label>
            <input class="rounded-md text-black" wire:model="name" name="name" id="name" type="text"/>
        </div>
        @error('name')
        <p class="text-sm font-bold text-red-700">{{$message}}</p>
        @enderror

        <div>
            <label for="email">email</label>
            <input class="rounded-md text-black" wire:model="email" name="email" id="email" type="text"/>
        </div>
        @error('email')
        <p class="text-sm font-bold text-red-700">{{$message}}</p>
        @enderror

        <div>
            <label for="password">Password</label>
            <input class="rounded-md text-black" wire:model="password" name="password" id="password" type="password"/>
        </div>
        @error('password')
        <p class="text-sm font-bold text-red-700">{{$message}}</p>
        @enderror

        <button type="submit">Submit</button>
    </form>

    <div>
        @foreach($users as $user)
            <p>{{$user->name}}</p>
        @endforeach
    </div>

    {{$users->links()}}
</div>
