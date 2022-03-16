@extends('layouts.adminLayout')
@section('title')
ADMIN - insert vesti
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col">   
          <form action="{{route('insertNews')}}" method="POST" enctype="multipart/form-data"class="p-5 bg-light">
                   {{csrf_field()}}
                    <table>
                        <tr>
                            <td> Naslov:</td>
                            <td><input class="form-control" type="text" id="title" name="title"></td>
                        </tr>
                        <tr>
                            <td>Tekst:</td>
                            <td><textarea class="form-control"id="body" name="body" cols="30" rows="10"> </textarea></td>
                        </tr>                       
                        <tr>
                            <td>Fotografija: </td>
                            <td><input class="form-control" type="file" id="photo" name="photo" ></td>
                        </tr>
                        <tr>
                            <td>Kategorija: </td>
                            <td><select name="ddlCategory" class="form-control">
                                    <option value="0">Izaberi</option>
                                    @foreach($linkovi as $link)
                                    <option value="{{$link->id_meni}}">{{$link->naziv}}</option>
                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right">
                                <input type="submit" value="Dodaj" id="add_news" name="add_news" class="btn"/>
                                
                                </td>
                        </tr>
                    </table>
                </form>
                </div>
      </div>
</div>
</div>
@endsection