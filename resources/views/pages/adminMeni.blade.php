@extends('layouts.adminLayout')
@section('title')
ADMIN
@endsection
@section('center')
<div class="site-section">
      <div class="container">
      <div class="row">
          <div class="col-8">
              <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">id_meni</th>
                    <th scope="col">naziv</th>
                    <th scope="col">aktivan</th>
                    <th scope="col">obriši</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($linkovi as $link)
                  <tr>
                    <td>{{$link->id_meni}}</td>
                    <td>{{$link->naziv}}</td>
                    <td>{{$link->aktivan}}</td>
                    <td><a href ="{{asset('/admin/delete/meni/'.$link->id_meni)}}" class="btn btn-danger btn-sm">obriši</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          <div class="col-4">
          <form action="{{route('insertMeni')}}" method="POST" name="form" class="p-5 bg-light">
          {{csrf_field()}}
                    <h4>Dodaj stavku menija</h4>
                    <table >
                        <tr>
                            <td>Stavka navigacije:</td>
                            <td ><input class="form-control form-control-lg" type="text" name="tbNav"/></td>
                            </tr>
                            <tr>
                            <td>Aktivan:</td>
                            <td ><input class="form-control form-control-lg" type="text" placeholder="1 ili 0" name="tbAktivan"/></td>
                            </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="update_meni" id="update_meni" class="btn btn-success btn-sm" value="Dodaj"></td>
                        </tr>
                    </table>
                </form>
          </div>
</div>
</div>
</div>
@endsection