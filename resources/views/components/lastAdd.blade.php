<div class="section-title"><br/><br/><br/>
			  <h2>Poslednje dodato </h2>
			</div>
     			 @foreach($news as $n) 
			<div class="trend-entry d-flex">
			  <div class="number align-self-start">&star;</div>
			  <div class="trend-contents">
				<h2><a href="{{asset('/singleNews'.$n->id_news)}}">{{$n->title}}</a></h2>
				<div class="post-meta">
					<span class="d-block"><a href="#">Kategorija</a> <a href="{{asset('/newsCategory'.$n->meni_id)}}">{{$n->naziv}}</a></span>
					<span class="date-read">{{date('d.m.Y. h:i',$n->created_at)}}  <span class="mx-1">&bullet;</span> </span>
				</div>
			  </div>
			</div>           
    		  @endforeach