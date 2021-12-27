<!DOCTYPE html>
@if(\App\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <html dir="rtl" lang="en">
@else
    <html lang="en">
@endif

@php
    $seosetting = \App\SeoSetting::first();
@endphp

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>@yield('meta_title', config('app.name', 'Laravel'))</title>
    <meta name="description" content="@yield('meta_description', $seosetting->description)" />
    <meta name="keywords" content="@yield('meta_keywords', $seosetting->keyword)">
    <meta name="author" content="{{ $seosetting->author }}">
    <meta name="sitemap_link" content="{{ $seosetting->sitemap_link }}">


    @yield('meta')

{{--<!--    &lt;!&ndash; Data table CSS &ndash;&gt;--}}
{{--    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}">--}}

{{--    &lt;!&ndash; Toastr &ndash;&gt;--}}
{{--    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}">-->--}}

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/vendors/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"><!-- Bootstrap -->

    <!-- Switchery -->
    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/vendors/bower_components/switchery/dist/switchery.min.css')}}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/css/font-awesome.min.css')}}">

    <!-- Themify -->
    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/css/themify-icons.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/css/style.css')}}">

    <link rel="stylesheet" href="{{static_asset('newui/assets/customer/css/sweetalert2.min.css')}}">

    @stack('css')
</head>
