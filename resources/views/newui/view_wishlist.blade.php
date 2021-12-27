@extends('newui.layouts.app')

@section('content')

    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                Wishlist
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="my-6">
                <h1 class="text-center">My wishlist</h1>
            </div>
            <div class="mb-16 wishlist-table">
                <div class="table-responsive">
                    <table class="table" cellspacing="0">
                        <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-Stock w-lg-15">Stock Status</th>
                            <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody id="wishlist-body">
                        @php $default_image = \Foundation\Lib\Meta::get('default_image'); @endphp
                        @if($wishlists->isNotEmpty())
                            @foreach ($wishlists as $key => $wishlist)
                                <tr id="wishlist_{{$wishlist->id}}">
                                    <td class="text-center">
                                        <i class="fa fa-trash btn btn-sm btn-danger remove_from_wishlist" data-id="{{ $wishlist->id }}" style="cursor: pointer"></i>
                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="{{ route('new.product', $wishlist->product->slug) }}">
                                            <img class="img-fluid max-width-100 p-1 border border-color-1"
                                                 src="{{ my_asset($wishlist->product->thumbnail_img) }}"
                                                 alt="Image Description">
                                        </a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="{{ route('new.product', $wishlist->product->slug) }}"
                                           class="btn btn-text text-gray-90">{{ $wishlist->product->name }}</a>
                                    </td>

                                    <td data-title="Unit Price">
                                        <span class="">{{ home_discounted_price($wishlist->product->id) }}</span>
                                    </td>

                                    <td data-title="Stock Status">
                                        @if($wishlist->product->current_stock <= 0)
                                            <span>Out of stock</span>
                                        @else
                                            <span>Available</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" onclick="showAddToCartModal({{ $wishlist->product->id }})"
                                                class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">
                                            Add to Cart
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td></td>
                                <td></td>
                                <td data-title="Stock Status">
                                    <code>Empty Wishlist ... </code>
                                    <a href="{{ route('new.home') }}">Continue Shopping</a>
                                </td>
                            </tr>
                        @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size"
             role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body">
                    <div class="col-10">
                        <button type="button"
                                class="btn btn-block btn-base-1 btn-circle btn-icon-left"
                                onclick="">
                            <i class="la la-shopping-cart mr-2"></i>{{ translate('Add to cart')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        const wishlist = {
            init : function () {
                this.cacheDom();
                this.bind()
            },

            cacheDom : function () {
                this.$wishlist = $('.cart-page');
            },

            bind : function () {
                this.$wishlist.on('click', '.remove_from_wishlist', this.removeFromWishlist);
            },

            removeFromWishlist : function () {
                var id = parseInt($(this).attr('data-id'));

                $.post('{{ route('new.wishlists.remove') }}', {
                    _token: '{{ csrf_token() }}',
                    id: id
                }, function (data) {
                    $('#wishlist').html(data);
                    $('#wishlist_' + id).hide();

                    var $wishlist = $('#total-wishlist-items');
                    var $wishlistNumber = parseInt($wishlist.attr('total-wishlist-items')) - 1;
                    $wishlist.attr('total-wishlist-items', $wishlistNumber);
                    $wishlist.text($wishlistNumber);

                    showFrontendAlert('success', 'Item has been removed from wishlist');

                    if (data.isEmptyWishlist) {
                        var wishlistBody = $('#wishlist-body');
                        var route = "{{ route('new.home') }}"
                        wishlistBody.html("");
                        wishlistBody.append("" +
                            "<tr><td></td><td></td>" +
                            "<td data-title='Stock Status'><code>Empty Wishlist ... </code>" +
                            "<a href=" + route + ">Continue Shopping</a></td></tr>"
                        );
                    }
                })
            }
        }
        wishlist.init();
    </script>
@endpush
