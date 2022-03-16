@extends('layouts.front')
@section('title')
    Kontakt
@endsection
@section('center')
<div class="col-lg-12">
            <div class="section-title mb-5">
              <h2>Kontaktirajte nas</h2>
            </div>
            <form method="post" action="{{route('contactPost')}}"class="p-5 bg-light">
                {{csrf_field()}}
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label for="fname">Ime i prezime:</label>
                          <input type="text" id="fname" name="fullName" class="form-control form-control-lg">
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="eaddress">E-mail adresa</label>
                          <input type="text" id="eaddress" name="Email" class="form-control form-control-lg">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label for="tel">Telefon</label>
                          <input type="text" id="tel" name="number" placeholder="format 06*/123123" class="form-control form-control-lg">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="message">Poruka</label>
                          <textarea  id="message" name="Message" cols="30" rows="10" class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
                          <input type="submit" value="Pošalji" name="contact-submit" class="btn btn-success btn-sm">
                      </div>
                  </div>
            </form>
          </div>
        </div>
@endsection