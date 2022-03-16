@extends('layouts.adminLayout')
@section('title')
ADMIN - komentari
@endsection
@section('center')
<div class="site-section">
      <div class="container">
      <div class="row">
      <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Redni broj</th>
                    <th scope="col">komentar</th>
                    <th scope="col">korisnik</th>   
                    <th scope="col">datum</th>                     
                    <th scope="col">obriši</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                  <tr>
                    <td>{{$comment->id_comment}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>{{$comment->username}}</td>
                    <td>{{date('d.m.Y. h:i',$comment->created_at)}}</td>
                    <td><a href ="{{asset('/admin/komentari/'.$comment->id_comment)}}" class="btn btn-danger btn-sm">obriši</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$comments->links()}}
</div>
</div>
</div>
@endsection