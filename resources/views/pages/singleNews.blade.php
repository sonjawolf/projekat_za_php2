@extends('layouts.front')
@section('title')
    Single News
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ">
            <p class="mb-5">
              <img src="{{$singleNews->image}}"  width="690px" height="400px" alt="Image" class="img-fluid">
            </p>  
            <h1 class="mb-4">
              {{$singleNews->title}}
            </h1>
            <div class="post-meta d-flex mb-5">
              <div class="bio-pic mr-3">
              </div>
              <div class="vcard">
                <span class="d-block">Kategorija <a href="{{asset('/newsCategory'.$singleNews->meni_id)}}">{{$singleNews->naziv}}</a></span>
                <span class="date-read"> {{date('d.m.Y. h:i',$singleNews->created_at)}}<span class="mx-1">&bullet;</span> <span class="icon-star2"></span></span>
              </div>
            </div>
            @for ($i = 0; $i < count(explode(";",$singleNews->text)); $i++)
              <p>  {{explode(";",$singleNews->text)[$i] }} </p>
            @endfor
<hr/>
<div class="comment-form-wrap pt-5">
@if(!session('user'))
<h4>Ulogujte se za komentare!</h4>
@endif
@if(session()->has('user'))
                      <h3>Ostavite komentar</h3>
                      <div class="comment-form-wrap pt-5">
                <form action="{{route('comment')}}" method="post" name="commentform" class="p-5 bg-light">
                    {{csrf_field()}}
                    <textarea name="comment" cols='30' rows='10'class="form-control" placeholder="Komentar..."></textarea>
                    <input type="hidden" name="news_id" id="news_id" value="{{$singleNews->id_news}}">
                    <input type="hidden" name="user_id" id="user_id" value="{{session()->get('user')[0]->id_user}}">
                    <br>
                    <input type="submit" value="Pošalji" name="com_submit" class="btn btn-primary py-3 px-5">
                </form>
            </div>
                    </div>
                  <div class="pt-5">
                    <div class="section-title">
                      <h2 class="mb-5">Komentari</h2>
                    </div>
                     @foreach($comment as $com)
                    <ul class="comment-list">
                      <li class="comment">
                        <div class="vcard bio">
                          <img src="{{$com->avatar}}" height="50px" width='50px' alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                          <h3>{{$com->username}}</h3>
                          <div class="meta">{{date('d.m.Y.  h:i',$com->created_at)}}</div>
                          <p>{{$com->comment}}</p>
                          <p></p>
                        </div>
                      </li>      
                    </ul>
                    @endforeach 
                  @endif              
				</div>
</div>
          <div class="col-lg-3 ml-auto">
          @include('components.lastAdd')                
          <p>
              <a href="{{asset('/')}}" class="more">Pogledaj sve vesti <span class="icon-keyboard_arrow_right"></span></a>
            </p>
          </div>
      </div>
    </div>
</div>
    @endsection