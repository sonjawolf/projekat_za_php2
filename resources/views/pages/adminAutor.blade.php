@extends('layouts.adminLayout')
@section('title')
ADMIN - autor
@endsection
@section('center')
<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col">   
                    <div class="col-sm-6 col-md-4">
                        <img src="{{asset('/images/avatar/autor.jpg')}}" alt="" height="40%" width="40%" class="img-rounded img-responsive" />
                    </div>
                        <p><h4>Sonja Damjanović</h4>Broj indeksa: 111/14</p><br/>
                        <p>Rodjena sam u Užicu 1986.godine, posle statusa mirovanja na Visokoj ICT, nastavljam gde sam stala- još malo do kraja.</p><br/>
                        <p>
                            <i class="glyphicon glyphicon-envelope">Email:<a href="mailto:sonja.damjanovic.111.14@ict.edu.rs">sonja.damjanovic.111.14@ict.edu.rs</a></i>
                            <br />
                            <br />
                        <!-- Split button -->
                </div>
      </div>
</div></div>
@endsection