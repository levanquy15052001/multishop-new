@include('user.include_user.head')
@include('user.include_user.topbar')
@include('user.include_user.navbar')
    @yield('login_user')
{{-- @include('user.include_user.slide') --}}
@include('user.include_user.categories')

    @yield('content_user')

@include('user.include_user.brands')
@include('user.include_user.footer')