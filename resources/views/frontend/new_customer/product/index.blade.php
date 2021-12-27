@extends('newui.customer.layouts.app')

@section('css')

@endsection

@section('content')

    <div class="container-fluid">

        @include('newui.customer.layouts.breadcrumb',
                   ['panel' => 'Product List'],
                   ['lists' => ['' => 'product'],
             ])

        <div class="row">
            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                <div class="col-md-4">
                    <div class="dashboard-widget text-center green-widget text-white mt-4 c-pointer">
                        <i class="la la-dropbox"></i>
                        <span class="d-block title heading-3 strong-400">{{ max(0, Auth::user()->seller->remaining_uploads) }}</span>
                        <span class="d-block sub-title">{{  translate('Remaining Uploads') }}</span>
                    </div>
                </div>
            @endif
            <div class="col-md-4 mx-auto">
                <a class="dashboard-widget text-center plus-widget mt-4 d-block" href="{{ route('new.seller.products.upload')}}">
                    <i class="la la-plus"></i>
                    <span class="btn btn-success">{{  translate('Add New Product') }}</span>
                </a>
            </div>

            @if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated)
                @php
                    $seller_package = \App\SellerPackage::find(Auth::user()->seller->seller_package_id);
                @endphp
                <div class="col-md-4 mt-10">
                    <a href="{{ route('seller_packages_list') }}" class="dashboard-widget text-center red-widget text-white mt-4 d-block">
                        @if($seller_package != null)
                            <img src="{{ my_asset($seller_package->logo) }}" height="44" class="img-fit mw-100 mx-auto mb-1">
                            <span class="d-block sub-title mb-2">{{ translate('Current Package')}}: {{ $seller_package->name }}</span>
                        @else
                            <i class="la la-frown-o mb-1"></i>
                            <div class="d-block sub-title mb-2">{{ translate('No Package Found')}}</div>
                        @endif
                        <div class="btn btn-styled btn-white btn-outline py-1">{{ translate('Upgrade Package')}}</div>
                    </a>
                </div>
            @endif
        </div>

        <div class="card no-border mt-10">
            <div class="card-header py-2">
                <div class="row align-items-center">
                    <div class="col-md-6 col-xl-3">
                        <h6 class="mb-0">All Products</h6>
                    </div>
                    <div class="col-md-6 col-xl-3 ml-auto">
                        <form class="" action="" method="GET">
                            <input type="text" class="form-control" id="search" name="search" @isset($search) value="{{ $search }}" @endisset placeholder="{{ translate('Search product') }}">
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel mt-20">
                <div class="card-body">
                    <table class="table table-sm table-hover table-responsive-md">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Name')}}</th>
                            <th>{{ translate('Sub Subcategory')}}</th>
                            <th>{{ translate('Current Qty')}}</th>
                            <th>{{ translate('Base Price')}}</th>
                            <th>{{ translate('Published')}}</th>
                            <th>{{ translate('Featured')}}</th>
                            <th>{{ translate('Options')}}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>
                                <td><a href="{{ route('new.product', $product->slug) }}" target="_blank">{{  __($product->name) }}</a></td>
                                <td>
                                    @if ($product->subsubcategory != null)
                                        {{ $product->subsubcategory->name }}
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $qty = 0;
                                        if($product->variant_product){
                                            foreach ($product->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        }
                                        else{
                                            $qty = $product->current_stock;
                                        }
                                        echo $qty;
                                    @endphp
                                </td>
                                <td>{{ $product->unit_price }}</td>
                                <td><label class="switch">
                                        <input onchange="update_published(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->published == 1) echo "checked";?> >
                                        <span class="slider round"></span></label>
                                </td>
                                <td><label class="switch">
                                        <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if($product->featured == 1) echo "checked";?> >
                                        <span class="slider round"></span></label>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="{{route('new.seller.products.edit', encrypt($product->id))}}" class="btn btn-sm btn-primary">{{ translate('Edit')}}</a>
                                        </div>
                                        <div class="col-sm-2">
                                            <button onclick="confirm_modal('{{route('new.products.destroy', $product->id)}}')" class="btn btn-sm btn-danger">{{ translate('Delete')}}</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="{{route('new.products.duplicate', $product->id)}}" class="btn btn-sm btn-success">{{ translate('Duplicate')}}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="pagination-wrapper py-4">
            <ul class="pagination justify-content-end">
                {{ $products->links() }}
            </ul>
        </div>

    </div>
    @include('frontend.new_customer.common.modal')

@endsection

@push('js')
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Featured products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    showFrontendAlert('success', 'Published products updated successfully');
                }
                else{
                    showFrontendAlert('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endpush
