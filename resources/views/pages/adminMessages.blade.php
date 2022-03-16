@extends('layouts.adminLayout')
@section('title')
ADMIN - autor
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col">   
          <table class="table table-hover" >
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Redni broj</th>
                    <th scope="col">Ime i prezime</th>
                    <th scope="col">E-mail</th>   
                    <th scope="col">Telefon</th> 
                    <th scope="col">Poruka</th>    
                    <th scope="col">Datum</th>   
                    <th scope="col">Obriši</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td>{{$message->id_contact}}</td>
                    <td>{{$message->full_name}}</td>
                    <td><a href="mailto:{{$message->email}}">{{$message->email}}</a></td>
                    <td>{{$message->mobile}}</td>
                    <td>{{$message->message}}</td>
                    <td>{{date('d.m.Y. h:i',$message->creaated_at)}}</td>
                    <td><a href ="{{asset('admin/messages/delete/'.$message->id_contact)}}" class="btn btn-danger btn-sm">obriši</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$messages->links()}}
           </div>
      </div>
</div></div>
@endsection