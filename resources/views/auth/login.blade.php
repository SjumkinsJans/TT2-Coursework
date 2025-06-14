<div>
    <x-layout>
        <x-slot name="title">
            Register
        </x-slot>
        <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
            <form action="{{ route('login')}}" method="POST">
                @csrf
                <div>

                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('value') }}">

                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    
                </div>
            <button type="submit" class="btn btn-primary">Log into account</button>
        </div>
    </x-layout>
</div>