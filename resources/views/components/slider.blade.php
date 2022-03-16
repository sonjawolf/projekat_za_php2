<div class="site-section py-0">
      <div class="owl-carousel hero-slide owl-style">
      @foreach($news as $n)
        <div class="site-section">
          <div class="container">
            <div class="half-post-entry d-block d-lg-flex bg-light">
              <div class="img-bg"> <img src="{{$n->image}}" width="465px" height="369px"></div>
              <div class="contents">
       <span class="caption">Najnovije vesti</span>
       <h2><a href="{{asset('/singleNews'.$n->id_news)}}">{{$n->title}}</a></h2>
       <p class="mb-3">{{substr($n->text,0,150)}}...</p>
                <div class="post-meta">
                <span class="d-block"> Kategorija <a href="{{asset('/newsCategory'.$n->meni_id)}}">>{{$n->naziv}}</a></span>
                <span class="mx-1">&bullet;</span> <span class="date-read">{{date('d.m.Y. h:i',$n->created_at)}} <span class="mx-1">&bullet;</span> </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>


