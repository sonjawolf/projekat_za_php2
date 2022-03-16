@extends('layouts.front')
@section('title')
    Vesti
@endsection
@section('center')
	<div class="site-section">
	  <div class="container">
		<div class="row">
		  <div class="col-lg-9">
			<div class="section-title">
			  <span class="caption d-block small"></span>
        @foreach($newsCateg as $nc)
			  <h2></h2>
			</div>
			<div class="post-entry-2 d-flex">
			  <div class="thumbnail order-md-2" > <a href="" class='gall_item'>
        <img src="{{$nc->image}}" width="150px" height="100px"/></a></div>
			  <div class="contents order-md-1 pl-0">
			  <h2><a href="{{asset('/singleNews'.$nc->id_news)}}">{{$nc->title}}</a></h2>
				<p class="mb-3">{{substr($nc->text,0,150)}}...</p>
				<div class="post-meta">
				  <span class="d-block"> Kategorija <a href="{{asset('/newsCategory'.$nc->meni_id)}}">{{$nc->naziv}}</a></span>
				  <span class="mx-1">&bullet;</span> <span class="date-read">{{date('d.m.Y. h:i',$nc->created_at)}} <span class="mx-1">&bullet;</span> </span>
				</div>
			  </div>
        @endforeach
			</div>
			</div>
		  <div class="col-lg-3">
			@include('components.lastAdd')
		  </div>
		</div>
		<div class="row">
		  <div class="col-lg-6">
      <ul class="custom-pagination list-unstyled">
	  {{$newsCateg->links()}}
            </ul>
		  </div>
		</div>
	  </div>
	</div>
  @endsection