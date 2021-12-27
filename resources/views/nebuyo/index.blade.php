
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
                    <div class="row g-0">
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a href="" class="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://w7.pngwing.com/pngs/870/26/png-transparent-iphone-7-mobile-phone-accessories-telephone-samsung-galaxy-s7-car-phone-accessory-miscellaneous-gadget-electronics.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://images.unsplash.com/photo-1546054454-aa26e2b734c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8bW9iaWxlfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://www.pngplay.com/wp-content/uploads/7/Android-Mobile-Download-Free-PNG.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqVaePQ_8dQYSGkFsZdfo8dPFHbHJnxFjCYQ&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <div a="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGPk8jwv0eUABE7vcoSDaUk7GUC4itz2Eb9K1JuOvoaJi3L4k6nrYM3QbE23msxHmlmNk&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN1_nD4re6Zb9opjZ1VgvbA5IHdu_UDO5WSw&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://img.favpng.com/5/4/0/screen-protectors-samsung-galaxy-s7-glass-mobile-phone-accessories-png-favpng-CzamNphzhMfbERAK95mKSfFV1.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://cdn.imgbin.com/17/5/18/imgbin-battery-charger-galaxy-nexus-mobile-phone-accessories-google-google-V5d3xKcSvvjtUPBmsNb7UE2y6.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-ZxYsedVp5gb7hEmEf6gycZHIVyJQ-Mb8hg&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://img.favpng.com/8/12/17/battery-charger-mobile-phone-accessories-iphone-headset-bluetooth-png-favpng-p0mwUaj6UrDtaaSdF6H62FCPi.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://cdn9.pngable.com/23/19/1/ajVTjzShzz/mobile-phone-case-mobile-phone-gadget-communication-device-mobile-phone-accessories.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://img1.pnghut.com/8/11/8/bVD1W5zqjy/adapter-computer-component-battery-mobile-phone-accessories-2018-mini-cooper-clubman.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://au-images.shop.samsung.com/medias/mobile-acccategory-fold3-pc-470x470.png?context=bWFzdGVyfGltYWdlc3wxNDYyMTZ8aW1hZ2UvcG5nfGg0ZC9oNWQvOTg3ODM1MzgwNTM0Mi9tb2JpbGUtYWNjY2F0ZWdvcnktZm9sZDMtcGMtNDcweDQ3MC5wbmd8M2Q3YWNiNTIzMWVkZDY4ZWUwNTFhNzUxYTQyYTVmMGU2N2ZhMjczODAwYWY1MzEwNDQzZGViMDIyN2VmMWI3Ng"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQRY5Wz1faSh_Sy2wmQreZwPXHb23W3na7og&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://imgmedia.lbb.in/media/2020/06/5ede49a41a6ca5462ce1ace4_1591626148380.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <div a="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://images.ctfassets.net/wcfotm6rrl7u/4NKaCxWoCpfhgh9vXoPezh/6e81f39dcdc419c4ca0c2ad9e62de350/nokia-BH-805-charcoal-pair.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://www.pngplay.com/wp-content/uploads/7/Android-Mobile-Download-Free-PNG.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://www.bethewind.in/img/Charger/CH-02/CH-02.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSLAsfReuKkkJubsRmidh7BCXwmcFzrbImhQ&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://i.pinimg.com/550x/97/f4/70/97f470f72667b773c26fd0a856eb9af3.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS020XeA1akvAc7bL02r3phnGAXO5cin9Eg5g&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyd34hZ3bfSNsBpQ3He_a5eCFlrhxcg0yCRA&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://3.imimg.com/data3/FR/RP/MY-1546894/mobile-bluetooth-500x500.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1601900775.75794078.png?width=420&height=420"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="http://img.av-connection.com/2/AVimg_32860.jpg"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPx9KqU7raMidMCuDjcxhDz69C7OyL86Tn4g&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS020XeA1akvAc7bL02r3phnGAXO5cin9Eg5g&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyd34hZ3bfSNsBpQ3He_a5eCFlrhxcg0yCRA&usqp=CAU"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://3.imimg.com/data3/FR/RP/MY-1546894/mobile-bluetooth-500x500.png"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                        <div
                            class="col-6 col-md-4 col-lg-3 col-xl-2 product-item card p-2"
                        >
                            <a class="" href="">
                                <div class="product-img mb-1">
                                    <img
                                        src="https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1601900775.75794078.png?width=420&height=420"
                                        alt=""
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="product-title">
                                    <p class="sm-dark-font" style="line-height: 20px">
                                        Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Nobis, commodi!?
                                    </p>
                                </div>
                                <div class="product-rating my-1">
                                    <p>
                      <span class="pe-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                        (102)
                                    </p>
                                </div>
                                <div class="">
                                    <h6 class="md-dark-bolder-font">
                                        NRs. 65.00
                                        <del class="sm-light-font ps-2">NRs. 123.99</del>
                                    </h6>
                                </div>
                            </a>
                        </div>
                    </div>
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
                                            id="email"
                                            name="email"
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
