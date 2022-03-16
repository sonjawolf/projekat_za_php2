@extends('layouts.front')
@section('title')
Home Page
@endsection
@section('center')
    <div class="site-section">
    
      <div class="container">
      @include('components.slider')
        <div class="section-title">
          <h2>Poslednje dodato</h2>
           </div>
      <div class="row"> 
      @foreach($news as $nc)
          <div class="col-lg-6">
            <div class="post-entry-2 d-flex">
              <div class="thumbnail"><img src="{{$nc->image}}" width="150px" height="100px"/></div>
              <div class="contents">
                <h2><a href="{{asset('/singleNews'.$nc->id_news)}}">{{$nc->title}}</a></h2>
                <p class="mb-3">{{substr($nc->text,0,90)}}...</p>
                <div class="post-meta">                 
                <span class="mx-1">&bullet;</span> <span class="date-read">{{date('d.m.Y. h:i',$nc->created_at)}} <span class="mx-1">&bullet;</span>Kategorija<a href="{{asset('/newsCategory'.$nc->meni_id)}}"> {{$nc->naziv}} </span>
                </div>
              </div>
            </div>
          </div
          >@endforeach  
</div>		  
          
          {{$news->links()}}
         
    </div>
 </div>
@endsection