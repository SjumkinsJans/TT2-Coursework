@php 
    $commentUserProfile = \App\Models\UserProfile::find($comment->user_id);
    $commentUser = \App\Models\User::find($comment->user_id);
@endphp
<div class="box mt-3 p-1 w-100  d-flex" >
    <div class="box w-25 h-100  d-flex justify-content-center" >     
        <img src="{{ asset('storage/'.$commentUserProfile->profile_picture)}}" class="w-50 h-100 border border-dark rounded-circle">
        <p class="w-25"> {{$commentUser->username}} :</p>
    </div>
     <p name="description" class="form-control w-75 border border-dark m-1" rows="6" readonly style="resize:none;">
       {{$comment->comment}}
     </p>
</div>
@can('delete',$comment)
    <form class="box p-1 w-100  d-flex justify-content-end" method="POST" action="{{route('comment.destroy',$comment->id)}}" onsubmit="return confirm('Are you sure you want to delete this comment ?');">
    @csrf
    @method('DELETE')     
        <button type="submit" class="btn btn-danger w-25" >Delete</button>
    </form>
@endcan