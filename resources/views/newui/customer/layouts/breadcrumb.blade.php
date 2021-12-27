<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">{{ $panel }}</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('new.dashboard') }}">Home</a></li>
            @if($lists)
                @foreach($lists as $link => $list)
                    <li class="{{ $loop->last ? 'active' : '' }}">
                        <a href="{{ $link }}">{{ $list }}</a>
                    </li>
                @endforeach
            @endif
        </ol>
    </div>
</div>
