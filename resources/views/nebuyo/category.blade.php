@extends('nebuyo.layouts.app')
@section('content')
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <section class="offerflash mt-3 mt-sm-2">
                    <div class="row g-0 offerflash-box">
                        <div class="col-6 col-sm-8 col-lg-9">
                            <div class="">
                                <p class="sm-white-font mb-0 mb-lg-3">
                                    <i class="bi bi-lightning-charge-fill"></i> Flash Offer
                                </p>
                                <h1 class="xl-flashoffer-white-bolder-font">
                                    Grab these offer now!
                                </h1>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 mt-2 mt-md-0">
                            <div class="text-end text-lg-start">
                                <p class="sm-time-white-font mb-0 mb-sm-1 mb-md-2 mb-lg-3">
                                    <i class="bi bi-clock me-2"></i>
                                    <span id="offer-option"></span>
                                </p>
                                <div
                                    class="
                      d-flex
                      justify-content-end justify-content-lg-between
                    "
                                >
                                    <div class="">
                                        <h1 class="time-white-font" id="offer-countdown-day"></h1>
                                        <p class="md-time-white-font text-center">Days</p>
                                    </div>
                                    <div class="">
                                        <h1 class="time-white-font">:</h1>
                                    </div>
                                    <div class="">
                                        <h1
                                            class="time-white-font"
                                            id="offer-countdown-hour"
                                        ></h1>
                                        <p class="md-time-white-font text-center">Hours</p>
                                    </div>
                                    <div class="">
                                        <h1 class="time-white-font">:</h1>
                                    </div>
                                    <div class="">
                                        <h1
                                            class="time-white-font"
                                            id="offer-countdown-minute"
                                        ></h1>
                                        <p class="md-time-white-font text-center">Minutes</p>
                                    </div>
                                    <div class="">
                                        <h1 class="time-white-font">:</h1>
                                    </div>
                                    <div class="">
                                        <h1
                                            class="time-white-font"
                                            id="offer-countdown-second"
                                        ></h1>
                                        <p class="md-time-white-font text-center">Seconds</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="products-group my-md-1 my-sm-2 my-md-3 my-lg-4">
                    @if($products->count())
                        @foreach($products->chunk(6) as $productChunk)
                            <div class="row g-0">
                                @foreach($productChunk as $product)
                                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2">
                                        @includeIf('nebuyo._partials.product-box',['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </section>
                <section class="email-search my-5">
                    <div class="row">
                        <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 mx-auto">
                            <p class="md-dark-font text-center mb-2">
                                Get the latest deals and more.
                            </p>
                            <div class="auth">
                                <form action="">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <input
                                            type="email"
                                            class="form-control w-75"
                                            id="email" name="email"
                                            placeholder="Enter email address"
                                        />
                                        <button class="fill-btn sm-white-font" style="width: 23%">
                                            Sign up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <footer>
            <div class="footer-wrapper mt-3">
                <div class="container">
                    <section class="footer-top border-bottom">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>Shop</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">Latest Products</a></li>
                                    <li><a href="">Top Rated Products</a></li>
                                    <li><a href="">Today's Deals</a></li>
                                    <li><a href="">Most Searched</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>Popular Categories</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">Mobile Phones</a></li>
                                    <li><a href="">Headseats</a></li>
                                    <li><a href="">Speakers</a></li>
                                    <li><a href="">Chargers</a></li>
                                    <li><a href="">Mobile Covers</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>My Account</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">Login / Register</a></li>
                                    <li><a href="">My Cart</a></li>
                                    <li><a href="">Order History</a></li>
                                    <li><a href="">Address Book</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>Customer Service</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">Help Center</a></li>
                                    <li><a href="">Return an Item</a></li>
                                    <li><a href="">Track an Order</a></li>
                                    <li><a href="">Shipping Information</a></li>
                                    <li><a href="">Payments Method</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>Company</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">About us</a></li>
                                    <li><a href="">Our location</a></li>
                                    <li><a href="">Blogs</a></li>
                                    <li><a href="">News room</a></li>
                                    <li><a href="">Careers</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4 col-lg-2 col-xl-2">
                                <div class="title">
                                    <p>Legal</p>
                                </div>
                                <ul class="list-unstyled useful-links">
                                    <li><a href="">Terms and Conditions</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Refund</a></li>
                                </ul>
                            </div>
                        </div>
                    </section>
                    <section class="footer-bottom px-0 mx-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="copyright">
                                <p>© 2021 Nebuyo</p>
                            </div>
                            <ul class="list-unstyled social-media-links mb-0">
                                <li class="social-icon">
                                    <a href="" class="me-3"
                                    ><i class="fab fa-facebook-f"></i
                                        ></a>
                                </li>
                                <li class="social-icon">
                                    <a href="" class="me-3"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="social-icon">
                                    <a href="" class="me-3"
                                    ><i class="fab fa-linkedin-in"></i
                                        ></a>
                                </li>
                                <li class="social-icon">
                                    <a href="" class="me-3"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </footer>
    </main>
@endsection
