<div> 
 <x-layout>
  <x-slot name="title">
    {{ $user->username }} profile
  </x-slot>

  <div class="d-flex flex-wrap justify-content-center border border-dark" style="width:1280px;">
  <div class="box border border-dark m-1 justify-content-center" style="width:300px;height:300px;">
    <img src="https://i.pinimg.com/736x/a4/42/9d/a4429dd24c639257ae52e4f0fd2e480a.jpg" class="border border-dark rounded-circle" style="width:100%;height:100%;">
  </div>

  <div class="box border border-dark m-1" style="width:900px;height:300px;">
    <h4>{{$user->username}}</h4>
    <p>{{$user_profile -> description}}</p>
  </div>

  <div class="box border border-dark m-1" style="width:1208px;height:40px;">

  </div>

  <div class="row d-flex flex-warp box border border-dark p-1" style="width:1208px;">

  @foreach($comics as $comic)
  <x-comic-card :comic='$comic'/>
  @endforeach
      @foreach($comics as $comic)
  <x-comic-card :comic='$comic'/>
  @endforeach
    

  </div>

</div>

 </x-layout>
</div>