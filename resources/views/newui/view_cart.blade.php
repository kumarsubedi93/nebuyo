@extends('newui.layouts.app')


@section('meta')
{{--    <link rel="canonical" href=""/>--}}
@endsection

@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        @if ($messages = Session::get('msgCartError'))
            <ul class="error_msg" style="display: none;">
            @foreach($messages as $message)
                <li class="error_msg_li">{{ $message .' out of stock'}}</li>
            @endforeach
            </ul>
        @endif

        <div class="container" id="cart-summary">
        @include('newui.common.cart_details')
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection



@push('script')
    <script type="text/javascript">
        @if (Session::has('msgCartError'))
            showFrontendCartAlert();
        @endif

        function showFrontendCartAlert() {
            var msg = $(document).find(".error_msg").html();
            var type = 'error';
            swal({
                position: 'top-end',
                type: type,
                title: msg,
                showConfirmButton: false,
                timer: 4000
            });
        }
    </script>
    <script type="text/javascript">
        cartQuantityInitialize();
        $('#option-choice-form input').on('change', function () {
            getVariantPrice();
        });
    </script>
@endpush
