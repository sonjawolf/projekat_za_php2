@extends('layouts.adminLayout')
@section('title')
ADMIN - vesti
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
        <div class="card-body">
              <form class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Pretraga vesti..." name="search" id="search"/>
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button" id="btnSearch">Pretraga</button>
                    </span>
                </div>
              </form>
            </div>
            <div id="postovi">
            </div>
        <table class="table table-hover" border="1 solid #FFA489">
            <thead class="thead-dark">
                <tr>
                    <th class="tg-s6z2"  collspan="3"><b>ID</b></th>
                    <th class="tg-s6z2"  collspan="3"><b>Naslov</b></th>
                    <th class="tg-s6z2"  collspan="3"><b>Kategorija</b></th>
                    <th class="tg-obcv" collspan="3"><b>Slika</b></th>				
                    <th class="tg-s6z2"  collspan="3"><b>Obriši</b></th>
                </tr> 
                </thead>
@foreach($news as $n)
                    <tr>   
                    <td class="tg-s6z2"  collspan="3">{{$n->id_news}}</td>                   
                        <td class="tg-s6z2"  collspan="3">{{$n->title}}</td>
                        <td class="tg-s6z2"  collspan="3">{{$n->naziv}}</td>
                        <td class="tg-obcv" collspan="3"><img src="../../{{$n->image}}" class="rounded-circle" height="100px" width="100px"></td>				
                        <td class="tg-s6z2"><a href ="{{asset('/admin/vesti/delete/'.$n->id_news)}}" class="btn btn-danger btn-sm">obriši</a></td>
                    </tr>
@endforeach
            </table> 
            {{$news->links()}}
      </div>
</div>
</div>
@endsection