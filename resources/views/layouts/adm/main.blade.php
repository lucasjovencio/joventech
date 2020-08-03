@include('layouts.adm.head')
@include('layouts.adm.nav')
    <div class="content">
        @include('layouts.error')
        @yield('main')
    </div>
@include('layouts.adm.footer')
@include('layouts.alerta')
