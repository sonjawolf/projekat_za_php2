@extends('layouts.adminLayout')
@section('title')
ADMIN - korisnici
@endsection
@section('center')
<div class="site-section">
      <div class="container">
      <div class="row">
     <form method="POST" action="{{asset('/admin/korisnici/ulogaUpdate')}}">
     {{csrf_field()}}
      <table class="table table-hover">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Redni broj</th>
                    <th scope="col">Korisnicko ime</th>
                    <th scope="col">Email</th>   
                    <th scope="col">Uloga</th> 
                    <th scope="col">Izaberi ulogu</th>          
                    <th scope="col">Izmeni ulogu</th>
                     <th scope="col">Obriši</th> 
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
               
                    <td>{{$user->id_user}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>                    
                    <td><select name="ddlRole" class="form-control">
                                    <option value="0">Izaberi</option>
                                    @foreach($users as $role)
                                    <option value="{{$role->id_role}}">{{$role->name}}</option>
                                    @endforeach
                                </select></td>
                    <td><a href ="" name="izmeni" class="btn btn-success btn-sm">izmeni</a></td>
                    <td><a href ="{{asset('/admin/korisnici/delete/'.$user->id_user)}}" class="btn btn-danger btn-sm">obriši</a></td> 
               
                  </tr>
                
                  @endforeach
                  
                </tbody>
                
              </table>
</form>
             
       
</div>
</div>
</div>
@endsection