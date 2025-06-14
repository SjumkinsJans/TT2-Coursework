<a href="{{ route('comic.show',$comic)}}" class="card col-1 border border-dark m-auto" style="width:390;height:500;"> 
      <form class="w-100 h-100 m-auto" method="" >
           <img src="{{asset($comic->cover_image)}}" class="m-1 border border-dark" style="width:357;height:400;">
            <div class="card-body  m-1" >
             <p class="card-title" style="font-size:19;font-weight:400;height:30">{{$comic->title}}</p>
           </div>
      </form>
</a>
