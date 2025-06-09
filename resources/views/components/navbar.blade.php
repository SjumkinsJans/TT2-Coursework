<div class="d-flex flex-wrap" style="width:1280px">
    <h1 style="width:20%;"><a href="{{ route('main.index') }}" style="text-decoration:none;">Home Page</a></h1>
    <h1 style="width:40%;"><a href="{{ route('main.index') }}" style="text-decoration:none;">Search</a></h1>
    @auth
    <h1 style="width:20%;"><a href="{{ route('user_profile.show', Auth::id()) }}" style="text-decoration:none;">Your Profile</a></h1>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit"><h1>Logout</h1></button>
    </form>
    @endauth
    @guest
    <h1 style="width:20%;"><a href="{{ route('showLogin') }}" style="text-decoration:none;">Login</a></h1>
    <h1 style="width:20%;"><a href="{{ route('showRegister') }}" style="text-decoration:none;">Sign up</a></h1>
    @endguest
</div>
