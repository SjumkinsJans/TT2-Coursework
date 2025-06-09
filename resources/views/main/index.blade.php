<div> 
 <x-layout>
  <x-slot name="title">
    Main Page
  </x-slot>

  <div class="d-flex flex-wrap justify-content-center border border-dark" style="width:1280px;">
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