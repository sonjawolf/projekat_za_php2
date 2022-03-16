<!DOCTYPE html>
<html lang="en">
  @include('components.header')
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <div class="site-wrap">
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <div class="header-top">
      @include('components.nav')
    </div>
            <div class="site-section">
            @include('components.success')
            @include('components.error')
            @include('components.roleError')
                <div class="container">
                    <div class="row">
                        @yield('center')
                    </div>
                </div>
            </div>
            <!-- END section -->
            @include('components.footer')
            @section('scripts')
            @show
        </div>
        <!-- .site-wrap -->
        <!-- loader -->
        @include('components.loader')
    </body>
</html>