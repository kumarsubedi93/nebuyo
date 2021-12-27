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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('new.home')}}">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Store Directory</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4 mb-md-6 text-center">
                <h1>Store Directory</h1>
            </div>
            <div class="mb-8">
                <div class="row no-gutters ec-store-directory align-items-start">
                    <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                        <li><a href="store-directory.html#">12.3 inch</a></li>
                        <li><a href="store-directory.html#">Ending Offers</a></li>
                        <li><a href="store-directory.html#">Gadgets</a>
                            <ul>
                                <li><a href="store-directory.html#">Gadgets &amp; Accesories</a></li>
                                <li><a href="store-directory.html#">Smartwatches</a></li>
                                <li><a href="store-directory.html#">Wearables</a></li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Smart Phones &amp; Tablets</a>
                            <ul>
                                <li><a href="store-directory.html#">Accessories</a></li>
                                <li><a href="store-directory.html#">Chargers</a></li>
                                <li><a href="store-directory.html#">Powerbanks</a></li>
                                <li><a href="store-directory.html#">Smartphones</a>
                                    <ul>
                                        <li><a href="store-directory.html#">4G LTE Smartphone</a></li>
                                        <li><a href="store-directory.html#">Cables</a></li>
                                        <li><a href="store-directory.html#">Chargers</a></li>
                                        <li><a href="store-directory.html#">Covers</a></li>
                                        <li><a href="store-directory.html#">Featured Phones</a></li>
                                        <li><a href="store-directory.html#">Holders</a></li>
                                        <li><a href="store-directory.html#">Mobile Phones</a></li>
                                        <li><a href="store-directory.html#">Mobiles Accesories</a></li>
                                        <li><a href="store-directory.html#">Powerbanks</a></li>
                                        <li><a href="store-directory.html#">Unlocked Phone</a></li>
                                    </ul>
                                </li>
                                <li><a href="store-directory.html#">Smartphones &amp; Tablets</a></li>
                                <li><a href="store-directory.html#">Smartphones &amp; Tablets</a></li>
                                <li><a href="store-directory.html#">Tablets</a>
                                    <ul>
                                        <li><a href="store-directory.html#">Featured Tablets</a></li>
                                        <li><a href="store-directory.html#">Tablet Accesories</a></li>
                                        <li><a href="store-directory.html#">Tablet Accessories</a></li>
                                        <li><a href="store-directory.html#">Tablet PCs</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">TV &amp; Audio</a>
                            <ul>
                                <li><a href="store-directory.html#">Audio</a></li>
                                <li><a href="store-directory.html#">Audio Speakers</a></li>
                                <li><a href="store-directory.html#">Portable Audio</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                        <li><a href="store-directory.html#">15 inch</a></li>
                        <li><a href="store-directory.html#">Computer Components</a>
                            <ul>
                                <li><a href="store-directory.html#">Computer Cases</a></li>
                                <li<a href="store-directory.html#">Desktops</a></li>
                                <li><a href="store-directory.html#">Monitors</a></li>
                                <li><a href="store-directory.html#">Software</a></li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Gadgets &amp; Accesories</a></li>
                        <li><a href="store-directory.html#">Printers &amp; Ink</a>
                            <ul>
                                <li><a href="store-directory.html#">Printers</a></li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Uncategorized</a></li>
                    </ul>
                    <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                        <li><a href="store-directory.html#">17 inch</a></li>
                        <li><a href="store-directory.html#">Car Electronic &amp; GPS</a></li>
                        <li><a href="store-directory.html#">GPS &amp; Navi</a></li>
                        <li><a href="store-directory.html#">Office Supplies</a></li>
                        <li><a href="store-directory.html#">Video Games &amp; Consoles</a>
                            <ul>
                                <li><a href="store-directory.html#">Accessories</a></li>
                                <li><a href="store-directory.html#">Action Games</a></li>
                                <li><a href="store-directory.html#">Game Consoles</a></li>
                                <li><a href="store-directory.html#">Racing Games</a></li>
                                <li><a href="store-directory.html#">Station Consoles</a></li>
                                <li><a href="store-directory.html#">Video Games &amp; Consoles</a></li>
                                <li><a href="store-directory.html#">Xbox</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                        <li><a href="https://transvelo.github.io/accessories/">Accessories</a>
                            <ul>
                                <li><a href="store-directory.html#">Cases</a></li>
                                <li><a href="store-directory.html#">Chargers</a></li>
                                <li><a href="store-directory.html#">Headphone Accessories</a></li>
                                <li><a href="store-directory.html#">Headphone Cases</a></li>
                                <li><a href="store-directory.html#">Headphones</a>
                                    <ul>
                                        <li><a href="store-directory.html#">Earbuds and In-ear</a></li>
                                        <li><a href="store-directory.html#">Kids' Headphones</a></li>
                                        <li><a href="store-directory.html#">Over-Ear and On-Ear</a></li>
                                        <li><a href="store-directory.html#">PC Gaming Headsets</a></li>
                                        <li><a href="store-directory.html#">Pro &amp; DJ Headphones</a></li>
                                        <li><a href="store-directory.html#">Refurbished Headphones</a></li>
                                        <li><a href="store-directory.html#">Refurbished Headphones</a></li>
                                        <li><a href="store-directory.html#">Waterproof Headphones</a></li>
                                        <li><a href="store-directory.html#">Wireless and Bluetooth</a></li>
                                    </ul>
                                </li>
                                <li><a href="store-directory.html#">Pendrives</a></li>
                                <li><a href="store-directory.html#">Power Banks</a></li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Cameras &amp; Photography</a>
                            <ul>
                                <li><a href="store-directory.html#">Cameras</a></li>
                                <li><a href="store-directory.html#">Photo Cameras</a></li>
                                <li><a href="store-directory.html#">Photo Cameras</a></li>
                                <li><a href="store-directory.html#">Video Cameras</a></li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Home Entertainment</a>
                            <ul>
                                <li><a href="store-directory.html#">Blue-ray Players</a></li>
                                <li><a href="store-directory.html#">DVD Players</a></li>
                                <li><a href="store-directory.html#">Home &amp; Audio Enternteinment</a></li>
                                <li><a href="store-directory.html#">Home &amp; Audio Enternteinment</a></li>
                                <li><a href="store-directory.html#">Home Theatres</a></li>
                                <li><a href="store-directory.html#">Projectors</a></li>
                                <li><a href="store-directory.html#">Speakers</a></li>
                                <li><a href="store-directory.html#">TVs</a>
                                    <ul>
                                        <li><a href="store-directory.html#">3D Tvs</a></li>
                                        <li><a href="store-directory.html#">4k Ultra HD TVs</a></li>
                                        <li><a href="store-directory.html#">Curved TVs</a></li>
                                        <li><a href="store-directory.html#">LED TVs</a></li>
                                        <li><a href="store-directory.html#">OLED TVs</a></li>
                                        <li><a href="store-directory.html#">Smart TVs</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="store-directory.html#">Laptops &amp; Computers</a>
                            <ul>
                                <li><a href="store-directory.html#">Accessories</a></li>
                                <li><a href="store-directory.html#">All in One</a></li>
                                <li><a href="store-directory.html#">Computer Accessories</a></li>
                                <li><a href="store-directory.html#">Computer Monitors</a></li>
                                <li><a href="store-directory.html#">Computers</a></li>
                                <li><a href="store-directory.html#">Desktop Computers</a></li>
                                <li><a href="store-directory.html#">Desktop PCs &amp; Laptops</a></li>
                                <li><a href="store-directory.html#">Desktop PCs &amp; Laptops</a></li>
                                <li><a href="store-directory.html#">Gaming</a></li>
                                <li><a href="store-directory.html#">Laptops</a></li>
                                <li><a href="store-directory.html#">Mac Computers</a></li>
                                <li><a href="store-directory.html#">Networking</a></li>
                                <li><a href="store-directory.html#">Notebooks</a></li>
                                <li><a href="store-directory.html#">Peripherals</a></li>
                                <li><a href="store-directory.html#">Refurbished Laptops</a></li>
                                <li><a href="store-directory.html#">Servers</a></li>
                                <li><a href="store-directory.html#">Software</a></li>
                                <li><a href="store-directory.html#">Ultrabooks</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Brand Carousel -->
            <div class="mb-8">
                <div class="py-2 border-top border-bottom">
                    <div class="js-slick-carousel u-slick my-1"
                         data-slides-show="5"
                         data-slides-scroll="1"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                         data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                         data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                         data-responsive='[{
								"breakpoint": 992,
								"settings": {
									"slidesToShow": 2
								}
							}, {
								"breakpoint": 768,
								"settings": {
									"slidesToShow": 1
								}
							}, {
								"breakpoint": 554,
								"settings": {
									"slidesToShow": 1
								}
							}]'>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img1.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img2.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img3.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img4.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img5.png" alt="Image Description">
                            </a>
                        </div>
                        <div class="js-slide">
                            <a href="store-directory.html#" class="link-hover__brand">
                                <img class="img-fluid m-auto max-height-50" src="assets/img/200X60/img6.png" alt="Image Description">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection