<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">{{translate('Slider Information')}}</h3>
    </div>

    <!--Horizontal Form-->
    <!--===================================================-->

    <table class="table" style="width: 95%;margin: 0 auto;">
        <thead>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>id</td>
            <td>{{ $slider->id }}</td>
        </tr>
        <tr>
            <td>title</td>
            <td>{{ $slider->title ?? 'null' }}</td>
        </tr>
        <tr>
            <td>subtitle</td>
            <td>{{ $slider->subtitle ?? 'null' }}</td>
        </tr>
        <tr>
            <td>link</td>
            <td>{{ $slider->link ?? 'null' }}</td>
        </tr>
        <tr>
            <td>price</td>
            <td>{{ $slider->price ?? 'null' }}</td>
        </tr>
        <tr>
            <td>Status</td>
            @if($slider->published == '1')
                <td>Published</td>
                @else
                <td>Not Published</td>
            @endif
        </tr>
        <tr>
            <td>photo</td>
            <td>
                <img src="{{ my_asset($slider->photo) }}" alt="" style="width: auto; height: 100px;">
            </td>
        </tr>
        </tbody>
    </table>

</div>
