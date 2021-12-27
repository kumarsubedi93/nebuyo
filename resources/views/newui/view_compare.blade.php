@extends('newui.layouts.app')

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Compare</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->

                <div class="col">
                    <div class="text-right">
                        <a href="{{ route('compare.reset') }}" style="text-decoration: none;" class="btn btn-link btn-base-5 btn-sm">{{ translate('Reset Compare List')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End breadcrumb -->

        @if(Session::has('compare'))
            @if(count(Session::get('compare')) > 0)
                <div class="container">
                    <div class="table-responsive table-bordered table-compare-list mb-10 border-0">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th class="min-width-200">{{ translate('Product')}}</th>
                                @php $default_image = \Foundation\Lib\Meta::get('default_image'); @endphp

                                @foreach (Session::get('compare') as $key => $item)
                                    @php $product[$key] = \App\Product::find($item); @endphp
                                <td>
                                    <a href="{{ route('new.product', $product[$key]->slug) }}" class="product d-block">
                                        <div class="product-compare-image">
                                            <div class="d-flex mb-3">
                                                    <img class="img-fluid mx-auto lazyload"
                                                         src="{{ my_asset($default_image) }}"
                                                         data-src="{{ my_asset($product[$key]->thumbnail_img) }}"
                                                         alt="{{ $product[$key]->name }}">
                                            </div>
                                        </div>
                                        <h3 class="product-item__title text-blue font-weight-bold mb-3">{{ $product[$key]->name }}</h3>
                                    </a>
                                </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th>{{ translate('Price') }}</th>
                                @foreach (Session::get('compare') as $key => $item)
                                    <td>
                                        <div class="product-price">{{ single_price($product[$key]->unit_price) }}</div>
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th>{{ translate('Availability') }}</th>
                                @foreach (Session::get('compare') as $key => $item)
                                    @php
                                        $detailedProduct = $product[$key];
                                        $qty = 0;
                                        if($detailedProduct->variant_product){
                                            foreach ($detailedProduct->stocks as $key => $stock) {
                                                $qty += $stock->qty;
                                            }
                                        }
                                        else {
                                            $qty = $detailedProduct->current_stock;
                                        }
                                    @endphp
                                    @if ($qty > 0)
                                        <td><span>In stock</span>
                                    @else
                                        <td><span>Out of stock</span>
                                    @endif
                                @endforeach
                            </tr>

<!--                            <tr>
                                <th>Description</th>
                                <td>
                                    <ul>
                                        <li><span class="">Intel Core i5 processors (13-inch model)</span></li>
                                        <li><span class="">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                        <li><span class="">Flash storage</span></li>
                                        <li><span class="">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                        <li><span class="">Force Touch trackpad (13-inch model)</span></li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><span class="">No more blur and noise</span></li>
                                        <li><span class="">Cloud storage</span></li>
                                        <li><span class="">HD video recording</span></li>
                                        <li><span class="">Perfect for Selfies</span></li>
                                        <li><span class="">Enjoy advanced editing capabilities with the bundled Adobe Photoshop Lightroom 5 software.</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><span
                                                class="">Pair and Play with your Bluetooth® device with 30' range</span>
                                        </li>
                                        <li><span class="">12 hour rechargeable battery with Fuel Gauge</span></li>
                                        <li><span class="">Take hands-free calls with built-in mic*</span></li>
                                        <li><span class="">Fine-tuned acoustics for clarity, breadth and balance</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        <li><span class="">Intel Core i5 processors (13-inch model)</span></li>
                                        <li><span class="">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                        <li><span class="">Flash storage</span></li>
                                        <li><span class="">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                        <li><span class="">Force Touch trackpad (13-inch model)</span></li>
                                    </ul>
                                </td>
                            </tr>-->

                            <tr>
                                <th>{{ translate('Add to cart') }}</th>
                                @foreach (Session::get('compare') as $key => $item)
                                    <td>
                                        <div class=""><a href="#" onclick="showAddToCartModal({{ $item }})"
                                                         class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">{{ translate('Add to cart')}}</a></div>
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th>{{ translate('Brand') }}</th>
                                @foreach (Session::get('compare') as $key => $item)
                                    <td>
                                        @if ($product[$key]->brand != null)
                                            {{ $product[$key]->brand->name }}
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @else
            <div class="card-body">
                <p>{{ translate('Your comparison list is empty')}}</p>
            </div>
        @endif
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection
