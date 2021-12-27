@extends('layouts.blank')

@section('content')
<div class="text-center">
    <h1 class="error-code text-danger">{{translate('500')}}</h1>
    <p class="h4 text-uppercase text-bold">{{translate('OOPS!')}}</p>
    <div class="pad-btm">
        {{translate('Something went wrong. Looks like server failed to load your request.')}}
    </div>
    <hr class="new-section-sm bord-no">
    <div class="pad-top"><a class="btn btn-primary" href="{{ route('new.home') }}">{{translate('Return Home')}}</a></div>
</div>
@endsection
