<div> 
 <x-layout>
  <x-slot name="title">
    Main Page
  </x-slot>

  <div class="d-flex flex-wrap justify-content-center border border-dark w-100" >
    <div class="box border border-dark m-1 w-100" style="height:40px;">

    </div>
    <div class="row d-flex flex-warp box border border-dark p-1 w-100">

     @foreach($comics as $comic)
     <x-comic-card :comic='$comic'/>
     @endforeach
    </div>
  
  </div>

</div>

 </x-layout>
</div>