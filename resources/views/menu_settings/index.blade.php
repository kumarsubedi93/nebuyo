@extends('layouts.app')

@push('css')

    <style>
        span.todays-deal {
            color: red;
        }
    </style>

@endpush

@section('content')
    <div class="tab-base">
    <!--Tabs Content-->
        <div class="tab-content">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">{{translate('all category ')}}</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Menu Active</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($parent_categories as $key => $menu)
                            <tr style="cursor: pointer;"  data-id="{{ $menu['id'] }}" >
                                <input type="hidden" name="ids[]" value="{{ $menu['id'] }}">
                                <td>
                                    {{ $menu['name'] }}
                                </td>
                                <td>
                                    <label class="switch">
                                        <input onchange="update_menu_status(this)" value="{{ $menu['id'] }}" name="menu_active"
                                               @if(isset($menu['menu_status'])) {{ $menu['menu_status'] == 1 ? "checked" : '' }} @endif type="checkbox">
                                        <span class="slider round"></span></label>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ static_asset('js/jquery-ui.js') }}"></script>
    <script>
        function update_menu_status(el) {
            var status = null;
            var id = null;
            if (el.checked) {
                status = 1;
            } else {
                status = 0;
            }
            id = el.value;

            var url = '{{ route('menu_settings.ajax_update_status') }}';

            $.post(url, {_token: '{{ csrf_token() }}', id: id, status: status, _method: 'POST'}, function (data) {
                if (data == 1) {
                    showAlert('success', 'Menu status updated successfully');
                } else {
                    showAlert('danger', 'Something went wrong');
                }
            });
        }
        $(document).ready(function () {
            $('table tbody').sortable({
                helper: fixWidthHelper,
                update: onDropHelperFunction
            }).disableSelection();
            function fixWidthHelper(e, ui) {
                ui.children().each(function() {
                    $(this).width($(this).width());
                });
                return ui;
            }
            function onDropHelperFunction(){
                var values = $("input[name='ids[]']")
                    .map(function(){return $(this).val();}).get();
                $.ajax({
                    url: '{{ route('menu_settings.ajax_update') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: values,
                    },
                    success: function (response) {
                        if(!response.error) {
                            showAlert('success', 'Menu order updated successfully');
                        } else {
                            showAlert('danger', 'Something went wrong');
                        }
                    }
                })
            }
        });
    </script>

@endsection
