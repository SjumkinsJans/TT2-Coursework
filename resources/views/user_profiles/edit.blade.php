<div> 
 <x-layout>
  <x-slot name="title">
    {{ $user->username }} profile
  </x-slot>

  <form method="POST" action="{{ route('user_profile.update',$user_profile)}}" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to update this account ?');">
  @csrf 
  @method('PUT')

  <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
    <div div class="justify-content-center w-25 h-25">
      <label for="profile_picture" class="form-label"></label>
      <img id="profile_picture" src="{{asset('storage/'.$user_profile->profile_picture)}}" class="m-1 border border-dark rounded-circle " style="width:300;height:300px;">
      <input type="file" name="profile_picture" id="image" onchange="document.getElementById('profile_picture').src = window.URL.createObjectURL(this.files[0])">
    </div>

   <div class="box p-2 mr-0 w-75 h-25">
     <h4>{{$user->username}}</h4>
     <textarea name="description" class="form-control" rows="10" style="resize:none;">{{ old('description') ? old('description') : $user_profile->description }}</textarea>
   </div>
    @can('update',$user_profile)
    <div class="box border justify-content-left w-100">
        <button type="submit" class="btn btn-primary w-25">Update User Profile</button>     
    </div>
    @endcan

  </div>

 </form>

    <div>  
      @can('delete',$user_profile)
        <form method="POST" action="{{ route('user_profile.destroy',$user_profile)}}" onsubmit="return confirm('Are you sure you want to delete this account ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger w-25">Delete Account</button>
        </form>
      @endcan
    </div>
 </x-layout>
</div>