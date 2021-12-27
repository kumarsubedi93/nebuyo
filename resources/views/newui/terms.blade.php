@extends('newui.layouts.app')

@section('meta_title'){{ $data['page']['meta_title'] ?? ''}}@stop

@section('meta_description'){{ $data['page']['meta_description'] ?? '' }}@stop

@section('meta_keywords'){{ $data['page']['keywords'] ?? '' }}@stop

@section('content')

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{ route('new.home') }}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Terms and Conditions</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        @if($data['page'])
            <div class="container">
            <div class="mb-12 text-center">
                <h1>{{ $data['page']['title'] }}</h1>
                <p class="text-gray-44">This Agreement was last modified on 18th february 2019</p>
            </div>
            {!! $data['page']['content'] !!}
        </div>
        @endif
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection
