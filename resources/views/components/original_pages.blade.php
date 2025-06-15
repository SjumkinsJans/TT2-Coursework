<div class="box m-1 text-center position-relative" style="width:206px;height:300px;">
    <label class="d-block border border-dark h-100 w-100">
        <input type="hidden" class="d-none" name="original_path[]" value="{{ $page->image }}">
        <input  type="file"class="d-none" name="changes[]" accept="image/*" onchange="pageInput(event,false)">
        <img src="{{asset($page->image)}}" alt="" class="border border-dark w-100 h-100" style="object-fit:contain;">
        <button onclick="event.target.closest('.box').remove()" class="text-danger border-0 mt-1 position-absolute bg-transparent top-0 end-0 m-1">x</button>
    </label>
</div>
