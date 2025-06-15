<div> 
 <x-layout>
  <x-slot name="title">
    {{ $user->username }} profile
  </x-slot>

  <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
    @if(session('success'))
      <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-success m-0">{{ session('success')}}</p></div>
    @endif  
    <div class="justify-content-center w-25 h-25" >
      <img src="{{asset('storage/'.$user_profile->profile_picture)}}" alt="" class="m-1 border border-dark rounded-circle" style="width:300px;height:300px;">
    </div>
  
    <div class="box ml-1 mr-0 w-75 h-25 p-2">
      <h4>{{$user->username}}</h4>
      <p>{{$user_profile -> description}}</p>
    </div>
    @can('edit',$user_profile)
    <div class="box ml-1 mr-0 w-100">
      <a class="m-1 w-25 text-center" href="{{ route('user_profile.edit', $user_profile->user_id )}}">Account Settings</a>
    </div>
    @endcan
  
     <div class="row d-flex flex-warp box border border-dark w-100">
      @foreach($comics as $comic)
       <x-comic-card class="m-auto" :comic='$comic'/>
      @endforeach
     </div>

  </div>

 </x-layout>
</div>