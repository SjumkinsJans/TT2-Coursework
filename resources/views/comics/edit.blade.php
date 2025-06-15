<x-layout>
    <x-slot name="title">
        Editing Comic
    </x-slot>
    <form method="POST" action="{{route('comic.update',$comic)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="d-flex flex-wrap justify-content-center border border-dark w-100">
           @error('title')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">INCORRECT TITLE</p></div>
           @enderror
           @error('description')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">INCORRECT DESCRIPTION</p></div>
           @enderror
           @error('comic_genre_id')
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">NO GENRE CHOSEN</p></div>
           @enderror
           @if(session('error'))
           <div class="d-flex w-100 m-1"><p class="text-light w-100 bg-danger m-0">{{ session('error')}}</p></div>
           @endif
           <div class="box p-1 m-0 justify-content-center w-50" style="height:900px;">
             <img src="{{asset($comic->cover_image)}}" alt="" id="cover_image_preview" class="border border-dark w-100 h-100">
           </div>
         <div class="box w-50 h-75 p-1" style="overflow:hidden;">
           <div class="box border border border-dark m-0 p-1 w-100">
                <label for="title" class="form-row">Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ? old('title') : $comic->title }}">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control w-100" style="resize:none;" rows="28">{{ old('description') ? old('description') : $comic->description }}
               </textarea>
               <select name="comic_genre_id" class="form-select">
               <option value="">Select Genre</option>
               @foreach($genres as $genre)
               <option value="{{$genre->id}}" @selected(old('comic_genre_id', $comic->comic_genre_id) == $genre->id) >{{$genre->comic_genre}}</option>
               @endforeach
               </select>
               <div class="box m-0 p-0 w-100">
              <label for="cover_image" class="form-label">Select Cover Image</label><br>
              <input type="file" name="cover_image" onchange="document.getElementById('cover_image_preview').src = window.URL.createObjectURL(this.files[0])">
          </div>
           </div>
        
          </div>
        <div id="page_input_container" class="d-flex flex-wrap border border-dark m-1 w-100 justify-content-center">
          @foreach($pages as $page)
          <x-original_pages :page='$page'/>
          
          @endforeach
          <div class="box m-1 text-center position-relative" style="width:206px;height:300px;">
            <label class="d-block border border-dark h-100 w-100">
              <input  type="file" class="d-none" name="new_pages[]" accept="image/*" onchange="pageInput(event,true)">
              <img src="" alt="" class="border border-dark w-100 h-100 d-none">
              <p class="text-muted d-flex align-items-center justify-content-center h-100">+ Add Page</p>
            </label>
          </div>
        
        </div>
    </div>
    @can('update',$comic)
    <button type="submit" class="btn btn-primary w-25">Update</button>
    @endcan
  </form>
</x-layout>


<script>

function pageInput(event, isNew) {
    const imageInput = event.target;
    const file = imageInput.files[0];
    if (!file) return;

     
    const block = imageInput.closest('.box');
    const img = block.querySelector('img');
    const addPageP = block.querySelector('p');

    img.src = URL.createObjectURL(file);
    img.classList.remove('d-none');
    addPageP.classList.add('d-none');

    
    if(isNew) {
    imageInput.removeAttribute('onchange');
    imageInput.setAttribute('onchange','pageInput(event,false)');
    const newPageContainer = document.createElement('div');
    newPageContainer.className = 'box m-1 text-center position-relative';
    newPageContainer.style.width = '206px';
    newPageContainer.style.height = '300px';
    newPageContainer.innerHTML = `
        <label class="d-block border border-dark h-100 w-100">
            <input type="file" class="d-none" name="new_pages[]" accept="image/*" onchange="pageInput(event,true)">
            <img src="" alt="" class="border border-dark w-100 h-100 d-none" style="object-fit:contain;">
            <p class="text-muted d-flex align-items-center justify-content-center h-100">+ Add Page</p>
        </label>
    `;
    removeButton(block);
    document.getElementById('page_input_container').appendChild(newPageContainer);
    }
}

function removeButton(block) {
  const removeBtn = document.createElement('button');
    removeBtn.className = 'text-danger border-0 mt-1 position-absolute bg-transparent top-0 end-0 m-1';
    removeBtn.textContent = 'x';
    removeBtn.onclick = () => {
        block.remove();
       
    };
    block.appendChild(removeBtn);
}
</script>

