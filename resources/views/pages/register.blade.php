@extends('layouts.front')
@section('title')
Registracija
@endsection
@section('center')
@if(!session('user'))
<form id="register-form" action="{{route('registerr')}}" method="post" role="form" enctype="multipart/form-data">
                                {{ csrf_field() }}
									<div class="form-group">
										<input type="text" name="nameRegister" id="username"  class="form-control" placeholder="Korisničko ime" value="">
									</div>
									<div class="form-group">
										<input type="text" name="emailRegister" id="email"  class="form-control" placeholder="Email Adresa" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password"  class="form-control" placeholder="Lozinka">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm_password"  class="form-control" placeholder="Lozinka ponovo">
									</div>
									    <span class="btn btn-default btn-file">
									       Avatar <input type="file" name="file" id="file"><br/>
									    </span>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" class="btn btn-success btn-sm" value="Registruj se">
											</div>
										</div>
									</div>
								</form>
@endif
@endsection
@section('scripts')
    <!-- <script>
        let password=document.querySelector("input[name='password']");
        let cpassword=document.querySelector("input[name='confirm_password']");
        function validatePassword(){
            if(password.value!=cpassword.value){
                cpassword.setCustomValidity("Lozinke se ne poklapaju");
            }else{
                cpassword.setCustomValidity('');
            }
        }
        cpassword.onblur=validatePassword;
    </script> -->
@endsection