@push('css')
    <link href="{{ static_asset('newui/js/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css"/>

@endpush

@push('js')
    <script src="{{ static_asset('newui/js/dropify/dropify.min.js') }}"></script>
    <script>
        $(function () {
            $('.dropify').dropify();
        })
    </script>
@endpush
