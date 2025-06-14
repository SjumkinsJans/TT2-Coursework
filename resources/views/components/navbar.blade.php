<div class="d-flex flex-wrap w-100">
    <h1 class="w-25"><a href="{{ route('main.index') }}" style="text-decoration:none;">Home Page</a></h1>
    <h1 class="w-50"><a href="{{ route('main.index') }}" style="text-decoration:none;">Search</a></h1>
    @auth
    
    <div class="dropdown w-25">
     <h1>
      <button data-bs-toggle="dropdown" aria-expanded="false" class="border-0 p-0">
       Account
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('user_profile.show', Auth::id()) }}">Your Profile</a></li>
        @can('create',\App\Models\Comic::class)
        <li><a class="dropdown-item" href="{{ route('comic.create')}}">Upload content</a></li>
        @endcan
        <li><a class="dropdown-item" href="#">Latvian</a></li>
        <li>
           <a class="dropdown-item p-0">
             <form action="{{ route('logout') }}" method="POST" class="m-0">
              @csrf
              <button type="submit" class="border-0 dropdown-item text-danger">Logout</button>
             </form>
           </a>
       </li>
      </ul>
     </h1>
    </div>
    
    @endauth
    @guest
    <div class="dropdown w-25">
        <h1>
          <button data-bs-toggle="dropdown" aria-expanded="false" class="border-0 p-0 m-0">
          <p class="m-0">Account</p>
          </button>
           <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('showLogin') }}" style="text-decoration:none;">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('showRegister') }}" style="text-decoration:none;">Sign up</a></li>
           </ul>
        </h1>
    </div>
    @endguest
</div>
