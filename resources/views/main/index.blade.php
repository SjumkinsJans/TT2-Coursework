<div> 
 <x-layout>
  <x-slot name="title">
    Main Page
  </x-slot>
  <div class="d-flex flex-wrap justify-content-center border border-dark w-100" > 
    @if(session('success'))
      <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-success m-0">{{ session('success')}}</p></div>
    @endif  
    <div class="row d-flex flex-warp box border border-dark p-1 w-100">
     @foreach($comics as $comic)
     <x-comic-card :comic='$comic'/>
     @endforeach
    </div> 
  </div>
 </x-layout>
</div>