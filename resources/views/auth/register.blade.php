<x-layout>
    <x-slot name="title">
        Register
    </x-slot>
    <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
        @error('username')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">INCORRECT USERNAME</p></div>
        @enderror
        @error('email')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">EMAIL TAKEN</p></div>
        @enderror
        @error('password')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">PASSWORDS DIFFER</p></div>
        @enderror
        <form action="{{ route('register')}}" method="POST">
            @csrf
            <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required value="{{ old('username') }}">

                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                
                <label for="password_confirmation" class="form-label">Enter password again</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>
        <button type="submit" class="btn btn-primary">Register Account</button>
    </div>
</x-layout>
