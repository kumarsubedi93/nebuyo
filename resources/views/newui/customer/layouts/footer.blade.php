<!-- JavaScript -->
<!-- jQuery -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>


<!-- Data table JavaScript -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>

<!-- Owl JavaScript -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Switchery JavaScript -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ static_asset('newui/assets/customer/js/jquery.slimscroll.js') }}"></script>

<!-- ChartJS JavaScript -->
<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/chart.js/Chart.min.js') }}"></script>

<script src="{{ static_asset('newui/assets/customer/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ static_asset('newui/assets/customer/js/init.js') }}"></script>

<script src="{{ static_asset('newui/assets/customer/js/sweetalert2.min.js') }}"></script>

<script>
    function showFrontendAlert(type, message){
        if(type == 'danger'){
            type = 'error';
        }
        swal({
            position: 'top-end',
            type: type,
            title: message,
            showConfirmButton: false,
            timer: 3000
        });
    }
</script>

@foreach (session('flash_notification', collect())->toArray() as $message)
    <script>
        showFrontendAlert('{{ $message['level'] }}', '{{ $message['message'] }}');
    </script>
@endforeach

@stack('js')
