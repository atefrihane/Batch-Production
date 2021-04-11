<!DOCTYPE html>
<html>
@include('partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweet::alert')
    <div class="wrapper">

        @include('partials.navbar')
        @include('partials.aside')



        @yield('content')

        <!-- /.content-wrapper -->
        @include('partials.footer')
