<div>
    <x-layout>
        <x-slot name="title">
            Register
        </x-slot>
        <div class="d-flex flex-wrap justify-content-center border border-dark" style="width:1280px;">
            <form action="{{ route('register')}}" method="POST">
                @csrf
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('value') }}">

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('value') }}">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    
                    <label for="password_confirmation" class="form-label">Enter password again</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            <button type="submit" class="btn btn-primary">Register Account</button>
        </div>
    </x-layout>
</div>