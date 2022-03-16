@extends('layouts.front')
@section('title')
    Korisnički profil
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col">    
          <h4>Profil</h4>
                     <table class="table">
                            <tr>
                                <td>Korisničko ime:</td>
                                <td>{{$oneUser->username}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{$oneUser->email}}</td>
                            </tr>
                            <tr>
                                <td>Avatar:</td>
                                <td><img src="{{$oneUser->avatar}}" class="rounded-circle" height="100px" width="100px"></td>
                            </tr>
                        </table>
        </div>
        <div class="col-5">
        <h4>Uredi profil</h4>
                <form action="{{route('updateProfile')}}" method="POST" name="form"  class="p-5 bg-light">
                {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" placeholder="Korisničko ime" name="tbIme" id="tbIme" class="form-control form-control-lg"/>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="E-mail" name="tbEmail" id="tbEmail" class="form-control form-control-lg"/>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Lozinka" id="tbLozinka" name="tbLozinka" class="form-control form-control-lg"/>
                    </div>
                    <input type="submit" name="btnPodaci" value="Izmeni" class="btn btn-success btn-sm" />
                </form> 
    </div>
    <div class="col">
    <h4>Avatar</h4>
                <form  method="POST" action="{{route('updateAvatar')}}" enctype="multipart/form-data"  class="p-5 bg-light" >
                {{csrf_field()}}
                    <div >
                        <input type="file" name="fSlika" class="form-control"/>
                    </div>
                    <div class="">
                        <input type="submit" name="btnIzmena" value="Izmeni sliku" class="btn btn-success btn-sm"/>
                    </div>
                </form>
    </div>
      </div>
</div>
</div>
@endsection