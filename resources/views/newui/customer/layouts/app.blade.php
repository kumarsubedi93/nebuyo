@include('newui.customer.layouts.header')

<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper theme-1-active pimary-color-red">
    <!-- Top Menu Items -->
    @includeIf('newui.customer.layouts.navbar')
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    @includeIf('newui.customer.layouts.sidebar')
    <!-- /Left Sidebar Menu -->

    <!-- Main Content -->
    <div class="page-wrapper">
        @yield('content')

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2021 &copy; Sujan-Ecommerce</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
    </div>
    <!-- /Main Content -->

</div>
<!-- /#wrapper -->

@include('newui.customer.layouts.footer')


</body>
</html>


