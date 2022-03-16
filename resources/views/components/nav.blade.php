<div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 d-flex">
                            <a href="{{route('home')}}" class="site-logo">
                            E-magazine!
                            </a>
                            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                    class="icon-menu h3"></span></a>
                        </div>
                        <div class="col-12 col-lg-6 ml-auto d-flex">
                            <div class="ml-md-auto top-social d-none d-lg-inline-block">
                                <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                                <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                                <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                            </div>
                                <div class="d-flex">
                                     @if(session()->has('user') && session()->get('user')[0]->name == 'user')
                                     <a href="{{route('profile')}}"><span class="btn btn-info btn-sm">Korisnički profil</span></a>
                                    <a href="{{route('logout')}}"><span class="btn btn-danger btn-sm" aria-hidden="true" value="Logout">Logout </span></a>                                    
                                    @endif
                                    @if(session()->has('user') && session()->get('user')[0]->name == 'admin') 
                                    <a href="{{route('admin')}}"><span class="btn btn-info btn-sm">Admin panel</span></a>  
                                    <a href="{{route('logout')}}"><span class="btn btn-danger btn-sm" aria-hidden="true"value="Logout">Logout </span></a>                                                         
                                    @endif
                                @if(!session('user'))
                                <form id="login-form" action="{{route('login')}}" method="post" role="form" >
								{{ csrf_field() }}
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Korisničko ime" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Lozinka">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" class="btn btn-success btn-sm" value="Log In">
											</div>
                                        </div>
                                        <p><b>Nemate nalog?</b> <a href="{{route('register')}}">  <b>Registrujte se!</b></a></p>
                                    </div>
                                </form>
                                @endif
                                    <!-- <input type="email" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button> -->
                                </div>
                        </div>
                        <div class="col-6 d-block d-lg-none text-right">
                        </div>
                    </div>
                </div>
                <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <nav class="site-navigation position-relative text-right" role="navigation">
                                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li>                                        
                                            <a href="{{asset('/')}}" class="nav-link text-left">HOME</a>
                                        </li>
                                    @foreach($linkovi as $l)
                                        <li>                                        
                                            <a href="{{asset('newsCategory'.$l->id_meni)}}" class="nav-link text-left">{{$l->naziv}}</a>
                                        </li>
                                        @endforeach
                                        <li>                                        
                                            <a href="{{route('contact')}}" class="nav-link text-left">kontakt</a>
                                        </li>
                                    </ul>                                                                                                                                                                                                                                                                                         
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
</div>