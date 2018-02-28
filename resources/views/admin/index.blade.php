@include('layouts.header')
     @include('layouts.side_bar')   
      @include('layouts.nav_bar')
        <div class="content">
            @yield('main_content')
        </div>
      @include('layouts.footer')
   @include('layouts.js_link')
 @include('layouts.extra_js')
