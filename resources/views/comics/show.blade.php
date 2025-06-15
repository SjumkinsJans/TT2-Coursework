<x-layout>
    <x-slot name="title">
        {{$comic->title}}
    </x-slot>
    <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
           @if(session('success'))
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-success m-0">{{ session('success')}}</p></div>
           @endif
           <div class="box p-2 m-0 justify-content-center w-50" style="height:900px;">
             <img src="{{asset($comic->cover_image)}}" class="border border-dark w-100 h-100">
           </div>
        <div class="box w-50 p-2" style="height: 900px;">
           <div class="box m-0 p-0 w-100">
               <h1>{{$comic->title}}</h1>
               <h3>By {{$author->username}}</h3>
               <h3>Genre</h3>
               <p>{{$genre->comic_genre}}</p>
               <p style="height:80%; overflow-y: auto;" class="border p-2">
                 {{$comic->description}}
               </p>
               
           </div>
        </div>
        <div class="d-flex box w-100 justify-content-center m-2 gap-2 mt-0 mb-0">
            @can('edit',$comic)
             <a href="{{ route('comic.edit',$comic)}}"class="w-50 btn btn-primary">Edit</a>
            @endcan
            @can('delete',$comic)
            <form method="POST" action="{{route('comic.destroy',$comic)}}" class="w-50 m-0" onsubmit="return confirm('Are you sure you want to delete this comic ?');">
              @csrf 
              @method('DELETE')
             <button class="w-100 btn btn-danger">Delete</button>
            </form>
            @endcan
        </div>
      <div class="row d-flex flex-wrap justify-content-center align-items-center p-1 m-1 w-100" style="height:92vh;">

          <div class="box p-1 w-100 border border-dark d-flex justify-content-center align-items-center" style="height:100%;">
             <img src="{{ asset($pages[0]->image) }}" alt="" id="page_image" class="w-75 border border-dark img-fluid" style="max-height: 90vh;">
          </div>
      </div>
      <div class="box p-1   d-flex justify-content-center align-items-center w-100">
             <button class="w-25" id="prevBtn">Prev</button>          
             <button class="w-25" id="nextBtn">Next</button>    
      </div>
      <div class="box d-flex justify-content-center align-items-center w-100">
             <p id="page_number" class="m-0">1 of {{$pages->count()}}</p>
      </div>
       @auth
       <form class="w-100" method="POST" action="{{route('comic.comment',$comic->id)}}">
        @csrf             
         <div class="box p-1 w-100  d-flex " >
              <div class="box w-25 h-100  d-flex  justify-content-center" >
                  <img src="{{asset('storage/'.$user_profile->profile_picture)}}" class="w-50 h-100 border border-dark rounded-circle">
                  <p class="w-25">{{Auth::user()->username}}:</p>
                </div>
              <textarea name="comment" class="form-control w-75 border border-dark m-1" rows="6" style="resize:none;">
              </textarea>
         </div>
       
         <div class="box p-1 w-100  d-flex justify-content-end" >
              <button class="btn btn-primary w-25">Post</button>
         </div>
       </form>
       @endauth
       @foreach($comments as $comment)
         <x-comment :comment='$comment'/>        
       @endforeach
       
    </div>
</x-layout>


<script>
const pages = @json($pages);
let currPage = 0;
const imageHolder = document.getElementById('page_image');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const pageNumber = document.getElementById('page_number');

function changePage() {
    const page = pages[currPage];
    imageHolder.src = `/storage/${page.image}`;
    pageNumber.textContent = `${currPage+1} of ${pages.length}`;

    prevBtn.disabled = currPage === 0;
    nextBtn.disabled = currPage === pages.length - 1;
}

prevBtn.addEventListener('click', () => {
        if (currPage > 0) {
            currPage--;
            changePage();
        }
    })

nextBtn.addEventListener('click', () => {
        if (currPage < pages.length-1) {
            currPage++;
            changePage();
        }
    })


</script>