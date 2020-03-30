<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.metas')
    <title>{{ config('app.name') }} - @yield('title')</title>
    @include('includes.links')
</head>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    @include('includes.header-menu')
    <!-- End header header -->
    <!-- Left Sidebar  -->
    @include('includes.left-menu')
    <!-- End Left Sidebar  -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">

        <!-- Start Page Content -->
        @yield('body')
        <!-- End PAge Content -->

        <!-- footer -->
        @include('includes.footer')
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>

<!-- End Wrapper -->
@include('includes.scripts')

</body>

</html>