<a href="{{ route('comic.show',$comic)}}" class="card col-1 border border-dark m-auto mt-1 mb-1" style="width:390px;height:500px;"> 
      <form class="w-100 h-100 m-auto" method="" >
           <img src="{{asset($comic->cover_image)}}" class="m-1 border border-dark" style="width:357px;height:400px;">
            <div class="card-body  m-1" >
             <p class="card-title" style="font-size:19px;font-weight:400;height:30px">{{$comic->title}}</p>
           </div>
      </form>
</a>
