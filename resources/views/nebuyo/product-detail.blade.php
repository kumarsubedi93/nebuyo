@extends('nebuyo.layouts.app')
@section('content')
    <main class="main-content">
        <div class="light-bg ">
            <div class="container">
                <div class="row ">
                    <section class="header-breadcrumb my-2 my-md-3 my-lg-4 ">
                        <nav style="--bs-breadcrumb-divider:'>';" aria-label="breadcrumb" class="">
                            <ol class="breadcrumb my-0 py-2 py-ld-3">
                                <li class="breadcrumb-item "><a class="sm-light-font text-decoration-none" href="#">Home</a></li>
                                <li class="breadcrumb-item "><a class="sm-light-font text-decoration-none" href="#">Mobile</a></li>
                                <li class="breadcrumb-item "><a class="sm-light-font text-decoration-none" href="#">Mobile
                                        Accessories</a></li>
                                <li class="breadcrumb-item breadcrumb-product-title " aria-current="page">
                                    <a class="sm-dark-font tex text-decoration-none">JBL Clip 3 Portable Waterproof Wireless Bluetooth
                                        Speaker</a> </li>
                            </ol>
                        </nav>
                    </section>
                    <section class="product-page mb-5">
                        <div class="row product-cart-form white-bg p-2 p-xl-3 mb-2 mb-sm-3 mb-md-3 mb-lg-4 mb-xl-5 g-0">
                            <div class="col-md-6">
                                <div class="">
                                    <div class="row g-0">
                                        <div class="col-3 product-variety-box">
                                            <div class=" nav flex-column " id="tabs" role="tablist" aria-orientation="vertical">
                                                <button class="nav-link active" id="tab-item-1" data-bs-toggle="pill"
                                                        data-bs-target="#tab-content-1" type="button" role="tab" aria-controls="tab-content-1"
                                                        aria-selected="true">
                                                    <div class="tab-item-img">
                                                        <img
                                                            src="https://ae01.alicdn.com/kf/Hba407a4935f94ae89ff2932284a3b9b3o/Beautiful-Cat-Ears-Seven-Colour-Bluetooth-Headphones-Personal-Fashion-Gift-Headset-Luminescent-Earphones-Mobile-Phone-Earphone.jpg_640x640.jpg"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                </button>
                                                <button class="nav-link" id="tab-item-2" data-bs-toggle="pill" data-bs-target="#tab-content-2"
                                                        type="button" role="tab" aria-controls="tab-content-2" aria-selected="false">
                                                    <div class="tab-item-img">
                                                        <img
                                                            src="https://images.unsplash.com/photo-1572536147248-ac59a8abfa4b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGhlYWRwaG9uZXN8ZW58MHx8MHx8&w=1000&q=80"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                </button>
                                                <button class="nav-link" id="tab-item-3" data-bs-toggle="pill" data-bs-target="#tab-content-3"
                                                        type="button" role="tab" aria-controls="tab-content-3" aria-selected="false">
                                                    <div class="tab-item-img">
                                                        <img
                                                            src="https://thumbs.dreamstime.com/b/red-hearts-next-to-headphones-beautiful-music-i-love-you-concept-lie-black-background-nearby-your-favorite-171576768.jpg"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                </button>
                                                <button class="nav-link" id="tab-item-4" data-bs-toggle="pill" data-bs-target="#tab-content-4"
                                                        type="button" role="tab" aria-controls="tab-content-4" aria-selected="false">
                                                    <div class="tab-item-img">
                                                        <img src="https://i.pinimg.com/originals/a5/85/85/a58585f6333b51a5e2b65791097dc1a4.jpg"
                                                             alt="" class="img-fluid">
                                                    </div>
                                                </button>

                                            </div>
                                        </div>
                                        <div class="col-9 tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="tab-content-1" role="tabpanel"
                                                 aria-labelledby="tab-item-1">
                                                <div class="tab-content-img">
                                                    <img
                                                        src="https://ae01.alicdn.com/kf/Hba407a4935f94ae89ff2932284a3b9b3o/Beautiful-Cat-Ears-Seven-Colour-Bluetooth-Headphones-Personal-Fashion-Gift-Headset-Luminescent-Earphones-Mobile-Phone-Earphone.jpg_640x640.jpg"
                                                        data-zoom-image="https://ae01.alicdn.com/kf/Hba407a4935f94ae89ff2932284a3b9b3o/Beautiful-Cat-Ears-Seven-Colour-Bluetooth-Headphones-Personal-Fashion-Gift-Headset-Luminescent-Earphones-Mobile-Phone-Earphone.jpg_640x640.jpg"
                                                        alt="" class="img-fluid" id="zoom1">

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab-content-2" role="tabpanel" aria-labelledby="tab-item-2">
                                                <div class="tab-content-img">
                                                    <img
                                                        src="https://images.unsplash.com/photo-1572536147248-ac59a8abfa4b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGhlYWRwaG9uZXN8ZW58MHx8MHx8&w=1000&q=80"
                                                        alt="" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab-content-3" role="tabpanel" aria-labelledby="tab-item-3">
                                                <div class="tab-content-img">
                                                    <img
                                                        src="https://thumbs.dreamstime.com/b/red-hearts-next-to-headphones-beautiful-music-i-love-you-concept-lie-black-background-nearby-your-favorite-171576768.jpg"
                                                        alt="" class="img-fluid">
                                                </div>
                                                </button>
                                            </div>
                                            <div class="tab-pane fade" id="tab-content-4" role="tabpanel" aria-labelledby="tab-item-4">
                                                <div class="tab-content-img">
                                                    <img src="https://i.pinimg.com/originals/a5/85/85/a58585f6333b51a5e2b65791097dc1a4.jpg" alt=""
                                                         class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="add-to-cart-form p-3">
                                    <div class="">
                                        <h3 class="product-name">JBL Clip 3 Portable Waterproof Wireless Bluetooth Speaker</h3>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-xl-2">
                                        <div class="">
                                            <p class="brand-name mb-0">JBL</p>
                                        </div>
                                        <div class="">
                                            <a href="" class="share-btn"><i class="bi bi-share"></i> Share</a>
                                        </div>
                                    </div>
                                    <div class="product-rating mb-xl-2">
                                        <p>
                      <span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                      </span>
                                            (102)
                                        </p>
                                    </div>
                                    <p class="color-option mb-1 mb-xl-2">Color: <span class="product-color">Silver</span></p>
                                    <div class="d-flex mb-xl-3 color-items-list">
                                        <div class="form-check me-2">
                                            <input class="form-check-input d-none" type="radio" name="exampleRadios" id="color-type-1"
                                                   value="option1" checked>
                                            <label class="form-check-label color-pick" for="color-type-1">
                                                <div class="color-box bg-danger"></div>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input d-none" type="radio" name="exampleRadios" id="color-type-2"
                                                   value="option2">
                                            <label class="form-check-label color-pick" for="color-type-2">
                                                <div class="color-box bg-dark">
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <h4 class="lg-2-green-font mb-xl-3">NRs. 67374.00</h4>
                                    <div class="d-flex">
                                        <div class="">
                                            <p class="sm-light-font mb-xl-2 ">Rewards Points: <span class="sm-dark-font"
                                                                                                    style="line-height: 24px;">50</span> </p>
                                        </div>
                                        <div class="dropup reward-popup ms-2">
                                            <i class="far fa-question-circle sm-light-font dropend" type="button" id="popup-rewards"
                                               data-bs-toggle="dropdown" aria-expanded="false">
                                            </i>
                                            <div class="dropdown-menu shadow-lg" aria-labelledby="popup-rewards">
                                                <p class="sm-dark-font">Points you earn after buying this product</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="product-quantity mb-0">Quantity : <span class="value">1</span></p>
                                    <div class="quantity-changer d-flex mb-2 mb-xl-3">
                                        <button class="lg-light-font"><i class="bi bi-dash-lg"></i></button>
                                        <input type="number" class="text-center" min="1" value="1" max="10000000">
                                        <button class="lg-light-font"><i class="bi bi-plus-lg"></i></button>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <button class="outlinebtn w-100 sm-green-font">Add to Cart</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="fill-btn w-100 sm-white-font">Buy it Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row about-product-detail  white-bg p-3 g-0 ">
                            <div class="about-product-menu white-bg py-2 sticky-top">
                                <div id="details-menu">
                                    <ul class="nav border-bottom ">
                                        <li class="about-product-menu-link nav-item"><a
                                                class="nav-link active px-0 px-sm-0 px-md-1 px-lg-3 " type="button"
                                                id="overview-scrollspy">Overview</a></li>
                                        <li class="about-product-menu-link nav-item"><a class="nav-link px-0 px-sm-0 px-md-1 px-lg-3"
                                                                                        type="button" id="specification-scrollspy">Specifications</a></li>
                                        <li class="about-product-menu-link nav-item"><a class="nav-link px-0 px-sm-0 px-md-1 px-lg-3"
                                                                                        type="button" id="comparing-item-scrollspy">Compare</a></li>
                                        <li class="about-product-menu-link nav-item"><a class="nav-link px-0 px-sm-0 px-md-1 px-lg-3"
                                                                                        type="button" id="review-scrollspy">Reviews</a></li>
                                        <li class="about-product-menu-link nav-item"><a class="nav-link px-0 px-sm-0 px-md-1 px-lg-3"
                                                                                        type="button" id="customer-qa-scrollspy">Q & A</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="">
                                <h2 class="title my-3" id="overview-scrollspy-content">Overview</h2>
                                <p class="description">Bring the party poolside with this JBL Clip 3 Bluetooth speaker. It has a
                                    built-in carabiner, so you can easily hang it on furniture, and it's IPX7-rated for waterproof to
                                    withstand accidental submersion. This JBL Clip 3 Bluetooth speaker plays for up to 10 hours per charge
                                    and has noise-canceling speakerphone technology for clear calls.
                                </p>
                                <ul class=" list">
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                    <li>Connect wirelessly from a distance.
                                    </li>
                                </ul>
                                <h2 class="title my-3" id="specification-scrollspy-content">Specifiactions</h2>
                                <table class="row specification table  table-bordered mx-0 px-0">
                                    <tbody class="col-sm-9">
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Product Type</td>
                                        <td class="col-6">Speakers</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Brand</td>
                                        <td class="col-6">JBL</td>
                                    </tr>

                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">color</td>
                                        <td class="col-6">black,green,yello,forest</td>
                                    </tr>

                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Type</td>
                                        <td class="col-6">Portable speaker</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Connectivity</td>
                                        <td class="col-6">Wireless</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Rechargeble</td>
                                        <td class="col-6">Yes</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Battery Charge Time</td>
                                        <td class="col-6">10 hours</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Battery Life</td>
                                        <td class="col-6">20 days</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Number of Speaker</td>
                                        <td class="col-6">1</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Signal-to-Noise Ration (SNR)</td>
                                        <td class="col-6">80 decibles</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Minimum Frequency Response</td>
                                        <td class="col-6">120 hertz</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Maximum Frequency Ratio</td>
                                        <td class="col-6">20000 Hertz</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Model Name</td>
                                        <td class="col-6">JBLCLKSJDK</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Model Id</td>
                                        <td class="col-6">CLIP3</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Remote </td>
                                        <td class="col-6">NO</td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Dimension</td>
                                        <td class="col-6">2.40 x 5.71 x 7.80 Inches
                                        </td>
                                    </tr>
                                    <tr class="row border-bottom-0">
                                        <td scope="row" class="col-6 border-end-0">Weight</td>
                                        <td class="col-6">225 gm</td>
                                    </tr>

                                    </tbody>
                                </table>
                                <h2 class="title my-3" id="comparing-item-scrollspy-content">Compare with Similar Items</h2>
                                <div class="row g-0 ">
                                    <div class="col-6 col-sm-3 product-item ">
                                        <div class=" p-2 card mb-2">
                                            <a href="" class="  ">
                                                <div class="comparing-card-img mb-1">
                                                    <img
                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN1_nD4re6Zb9opjZ1VgvbA5IHdu_UDO5WSw&usqp=CAU"
                                                        alt="" class="img-fluid" />
                                                </div>
                                                <div class="comparing-card-title">
                                                    <p class="md-dark-font">Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Nobis, commodi!?</p>
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
                                                <div class=" mb-2">
                                                    <h6 class="md-dark-bolder-font">
                                                        NRs. 65.00
                                                    </h6>
                                                </div>
                                            </a>
                                            <div class="">
                                                <button class="fill-btn sm-white-font w-100">Add to Card
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch mt-3  mb-1 d-flex align-items-center">
                                            <input class="form-check-input" name="comparing-switch-btn" type="checkbox" id="comparing-switch-btn" checked>
                                            <label class="mb-0 ms-3"> Difference</label>
                                        </div>
                                        <table class="highlight-table table table-striped">
                                            <tbody>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">User Rating</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-rating">
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
                                                </td>

                                            </tr>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">Price</th>
                                            </tr>
                                            <tr class="">
                                                <td class="">
                                                    <p class="sm-light-font">
                                                        NRs. 2536
                                                    </p>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 col-sm-3 product-item added-item-to-compare position-relative">
                                        <button
                                            class="position-absolute top-0 start-50 translate-middle  border border-danger rounded-circle bg-white p-2 sm-light-font badge"
                                            style="z-index: 2;"><span class=""><i class="bi bi-x-lg"></i>
                      </span></button>
                                        <div class="p-2 card mb-2">
                                            <a href="" class="  ">
                                                <div class="comparing-card-img mb-1">
                                                    <img
                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGPk8jwv0eUABE7vcoSDaUk7GUC4itz2Eb9K1JuOvoaJi3L4k6nrYM3QbE23msxHmlmNk&usqp=CAU"
                                                        alt="" class="img-fluid" />
                                                </div>
                                                <div class="comparing-card-title">
                                                    <p class="md-dark-font">Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Nobis, commodi!?</p>
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
                                                <div class=" mb-2">
                                                    <h6 class="md-dark-bolder-font">
                                                        NRs. 65.00
                                                    </h6>
                                                </div>
                                            </a>
                                            <div class="">
                                                <button class="fill-btn sm-white-font w-100">Add to Card
                                                </button>
                                            </div>
                                        </div>
                                        <table class="highlight-table table table-striped mt-5">
                                            <tbody>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">User Rating</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-rating">
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
                                                </td>

                                            </tr>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">Price</th>
                                            </tr>
                                            <tr class="">
                                                <td class="">
                                                    <p class="sm-light-font">
                                                        NRs. 2536
                                                    </p>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 col-sm-3 product-item added-item-to-compare position-relative">
                                        <button
                                            class="position-absolute top-0 start-50 translate-middle badge border border-danger rounded-circle bg-white p-2 sm-light-font"
                                            style="z-index: 2;"><span class=""><i class="bi bi-x-lg"></i>
                      </span></button>
                                        <div class=" p-2 card mb-2">
                                            <a href="" class="  ">
                                                <div class="comparing-card-img mb-1">
                                                    <img
                                                        src="https://w7.pngwing.com/pngs/870/26/png-transparent-iphone-7-mobile-phone-accessories-telephone-samsung-galaxy-s7-car-phone-accessory-miscellaneous-gadget-electronics.png"
                                                        alt="" class="img-fluid" />
                                                </div>
                                                <div class="comparing-card-title">
                                                    <p class="md-dark-font">Skullcandy Lorem ipsumtem? Lorem ipsum dolor sit amet consectetur
                                                        adipisicing elit. Nobis, commodi!?</p>
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
                                                <div class=" mb-2">
                                                    <h6 class="md-dark-bolder-font">
                                                        NRs. 65.00
                                                    </h6>
                                                </div>
                                            </a>
                                            <div class="">
                                                <button class="fill-btn sm-white-font w-100">Add to Card
                                                </button>
                                            </div>
                                        </div>
                                        <table class="highlight-table table table-striped mt-5">
                                            <tbody>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">User Rating</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="product-rating">
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
                                                </td>

                                            </tr>
                                            <tr class="">
                                                <th scope="row" colspan="3" class="">Price</th>
                                            </tr>
                                            <tr class="">
                                                <td class="">
                                                    <p class="sm-light-font">
                                                        NRs. 2536
                                                    </p>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-6 col-sm-3 px-0 mx-0">
                                        <div class="p-3  mx-0">
                                            <div class="cart-item-comparision-box">
                                                <label for="formFile"
                                                       class="form-label d-flex flex-column justify-content-center align-items-center">
                                                    <div class="">
                                                        <p class="xl-green-font"> <i class="bi bi-plus-lg"></i></p>
                                                    </div>
                                                    <p class="title text-center">Add Item to Comparision</p>
                                                </label>
                                                <input class="form-control d-none" type="file" id="formFile">
                                            </div>
                                            <div class="border my-3 position-relative">
                                                <div class="divider-title px-2">or Select item</div>
                                            </div>
                                            <div class="auth">
                                                <button class="form-select" id="select-items-compare" data-bs-toggle="modal"
                                                        data-bs-target="#comparing-item">Select item for compare</button>
                                                <div class="modal fade " id="comparing-item" tabindex="-1" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog  modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-0">
                                                                <h4 class="lg-2-dark-font">Add items to compare </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body py-0">
                                                                <div class="res-serch-box auth mb-3" id="open-search-box">
                                                                    <form class="">
                                                                        <label for="res-search" class="nav-compare-label lg-light-font ">
                                                                            <i class="bi bi-search"></i>
                                                                        </label>
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <input class="form-control ps-5" type="text" type="search" placeholder="Search"
                                                                                   aria-label="Search">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <ul class="mb-0 list-unstyled comparing-item-list">
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img src="https://m.media-amazon.com/images/I/717aeqCigsL._SL1500_.jpg" alt=""
                                                                                         class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img
                                                                                        src="https://e7.pngegg.com/pngimages/308/834/png-clipart-mobile-phone-accessories-iphone-battery-charger-smartphone-telephone-mobile-gadget-electronics.png"
                                                                                        alt="" class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img
                                                                                        src="https://rukminim1.flixcart.com/image/416/416/khdqnbk0/battery-charger/t/z/s/star-mobile-accessories-sag-mys-7-original-imafxephjrymthvf.jpeg?q=70"
                                                                                        alt="" class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img
                                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsvVIPQr-AxAiV-rZni7Wmk2jfnUBgq28t8w&usqp=CAU"
                                                                                        alt="" class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img
                                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzjQ8VQDw0c_-WuBNYZgHfjaPffZJ-JNRSkw&usqp=CAU"
                                                                                        alt="" class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="py-2">
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="option-compare-card-img">
                                                                                    <img
                                                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvpS7nINsRdIPt5nAfCF_L5U16T3ChRhYh-Yl5lcJVYN-V-osCcAPf-i_zT8j-gDAx38c&usqp=CAU"
                                                                                        alt="" class="img-fluid">
                                                                                </div>
                                                                                <div class="">
                                                                                    <p class="md-dark-bolder-font ms-2">JBL - CHARGE5 Portable Waterproof Speaker
                                                                                        with Powerbank - Black</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="">
                                                                                <p class="md-green-font">Add to Compare</p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="highlight-table table table-striped d-none">
                                <tbody>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">User Rating</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-rating">
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
                                    </td>
                                    <td>
                                        <div class="product-rating">
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
                                    </td>
                                    <td>
                                        <div class="product-rating">
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
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                <tr class="">
                                    <th scope="row" colspan="3" class="">Price</th>
                                </tr>
                                <tr class="">
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                    <td class="">
                                        <p class="sm-light-font">
                                            NRs. 2536
                                        </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <h2 class="title my-3" id="review-scrollspy-content">Rating and Reviews</h2>
                            <div class="row g-0 mb-3">
                                <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                                    <h1 class="rating-point mb-3">4.8/5</h1>
                                    <div class="">
                    <span class="star-icons mb-3">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                    </span>
                                        <p class="mb-0 review-number">
                                            102 review
                                        </p>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-8 col-md-7 col-lg-6">
                                    <div class="progress-range d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0">5 stars</p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 81%" aria-valuenow="81"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="">
                                            <p class="mb-0">81%</p>
                                        </div>
                                    </div>
                                    <div class="progress-range d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0">4 stars</p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 11%" aria-valuenow="11"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="">
                                            <p class="mb-0">11%</p>
                                        </div>
                                    </div>
                                    <div class="progress-range d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0">3 stars</p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 5%" aria-valuenow="81"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="">
                                            <p class="mb-0">5%</p>
                                        </div>
                                    </div>
                                    <div class="progress-range d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0">2 stars</p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 3%" aria-valuenow="81"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="">
                                            <p class="mb-0">3%</p>
                                        </div>
                                    </div>
                                    <div class="progress-range d-flex justify-content-between align-items-center">
                                        <div class="">
                                            <p class="mb-0">1 stars</p>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="81"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="">
                                            <p class="mb-0">0%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row filter-option-box g-0 align-items-center">
                                <div class=" col-sm-6 col-xl-8  px-0">
                                    <p class="sm-dark-font ">Showing 1-4 of 102 Reviews</p>
                                </div>
                                <div class=" col-sm-3 col-xl-2  px-0 ">
                                    <div class="border-0 bg-transparent sm-light-font">
                                        <div class="form">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <div class="me-2">
                                                    <label for="products-sorting"> <i class="fas fa-sort-amount-down-alt me-2"></i> Sort:</label>
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <select name="" id="product-shorting"
                                                                class=" select-control form-control p-0 border-0 bg-transparent sm-dark-font">
                                                            <option value="" class="sm-dark-font">Relevance</option>
                                                            <option value="sm-dark-font">Famous</option>
                                                            <option value="sm-dark-font">Offers</option>
                                                            <option value="am-dark-font">Most Rating</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class=" col-sm-3 col-xl-2 mt-2 mt-sm-0 px-0 ">
                                    <div class="border-0 bg-transparent sm-light-font">
                                        <div class="form">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <div class="me-2">
                                                    <label for="products-sorting"><i class="bi bi-funnel me-2"></i> Filter:</label>
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <select name="" id="product-shorting"
                                                                class=" select-control form-control p-0 border-0 bg-transparent sm-dark-font">
                                                            <option value="" class="sm-dark-font">ALl Stars</option>
                                                            <option value="sm-dark-font">Famous</option>
                                                            <option value="sm-dark-font">Offers</option>
                                                            <option value="am-dark-font">Most Rating</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <ul class="review-product-list mb-0 list-unstyled">
                                <li class="row py-2 py-lg-3 py-xl-4 g-0">
                                    <div class="col-6 col-sm-5 col-md-4 col-lg-2">
                                        <div class="">
                                            <p class="sm-dark-font mb-2">Martialo</p>
                                            <p class="mb-0">
                        <span class="star-icons">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-7 col-md-8 col-lg-10">
                                        <div class="">
                                            <h4 class="md-dark-bold-font mb-1">Awesome Speaker</h4>
                                            <p class="sm-light-font mb-1 mb-lg-3">
                                                Posted 5 months ago.
                                            </p>
                                            <div class="mb-1 mb-lg-3">
                                                <p class="md-light-font mb-1">
                                                    This speaker is small but It packs a punch and can get loud. Perfect for outside. Would
                                                    recommend.
                                                </p>
                                                <p class="md-light-font">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique,
                                                    dolorem nostrum. Porro ipsa consequuntur maxime tempora, rerum dolore quasi ea.</p>

                                            </div>
                                            <div class="review-product-img mb-2">
                                                <img
                                                    src="https://images.pexels.com/photos/2651794/pexels-photo-2651794.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="row py-2 py-lg-3 py-xl-4 g-0">
                                    <div class="col-6 col-sm-5 col-md-4 col-lg-2">
                                        <div class="">
                                            <p class="sm-dark-font mb-2">Martialo</p>
                                            <p class="mb-0">
                        <span class="star-icons">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-7 col-md-8 col-lg-10">
                                        <div class="">
                                            <h4 class="md-dark-bold-font mb-1">Awesome Speaker</h4>
                                            <p class="sm-light-font mb-1 mb-lg-3">
                                                Posted 5 months ago.
                                            </p>
                                            <div class="mb-1 mb-lg-3">
                                                <p class="md-light-font mb-1">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt eius minima corporis nulla.
                                                    Omnis impedit quas numquam atque ipsum ex perspiciatis eveniet, animi voluptas fugiat.
                                                    Aspernatur perspiciatis ex eaque sed! This speaker is small but It packs a punch and can get
                                                    loud. Perfect for outside. Would recommend.
                                                </p>
                                                <p class="md-light-font">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique,
                                                    dolorem nostrum. Porro ipsa consequuntur maxime tempora, rerum dolore quasi ea.</p>

                                                <div class="review-product-img mb-2">
                                                    <img src="https://m.media-amazon.com/images/I/41sGASjc4-L.jpg" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                </li>
                                <li class="row py-2 py-lg-3 py-xl-4 g-0">
                                    <div class="col-6 col-sm-5 col-md-4 col-lg-2">
                                        <div class="">
                                            <p class="sm-dark-font mb-2">Martialo</p>
                                            <p class="mb-0">
                        <span class="star-icons">
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                          <i class="bi bi-star-fill"></i>
                        </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-7 col-md-8 col-lg-10">
                                        <div class="">
                                            <h4 class="md-dark-bold-font mb-1">Awesome Speaker</h4>
                                            <p class="sm-light-font mb-1 mb-lg-3">
                                                Posted 5 months ago.
                                            </p>
                                            <p class="md-light-font mb-1 mb-lg-3">
                                                This speaker is small but It packs a punch and can get loud. Perfect for outside. Would
                                                recommend.
                                            </p>
                                            <div class="review-product-img mb-2">
                                                <img
                                                    src="https://images.unsplash.com/photo-1601784551446-20c9e07cdbdb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bW9iaWxlJTIwcGhvbmV8ZW58MHx8MHx8&w=1000&q=80"
                                                    alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="row my-2 my-sm-3 my-md-4 my-lg-5">
                                <div class="col-11 col-sm-10 col-md-8 col-lg-6 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <button class="outlinebtn w-100 sm-green-font">Show More</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="fill-btn w-100 sm-white-font">View all customer reviews</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="title" id="customer-qa-scrollspy-content">Customer Q&A</h2>
                            <div class="row filter-option-box g-0 align-items-center">
                                <div class=" col-sm-6 col-xl-9  px-0">
                                    <p class="sm-dark-font ">Showing 1-4 of 102 Reviews</p>
                                </div>
                                <div class=" col-sm-6 col-xl-3 mt-2 mt-sm-0 px-0 border-left">
                                    <div class="border-0 bg-transparent sm-light-font">
                                        <div class="form">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <div class="me-2">
                                                    <label for="products-sorting"> <i class="fas fa-sort-amount-down-alt me-2"></i> Sort:</label>
                                                </div>
                                                <div class="">
                                                    <div class="">
                                                        <select name="" id="product-shorting"
                                                                class=" select-control form-control p-0 border-0 bg-transparent sm-dark-font">
                                                            <option value="" class="sm-dark-font">Most Recent Questions</option>
                                                            <option value="sm-dark-font">Famous</option>
                                                            <option value="sm-dark-font">Offers</option>
                                                            <option value="am-dark-font">Most Rating</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row my-2 my-lg-3 p-0">
                                <div class="order-last order-md-first col-md-3 mx-0 ps-0 py-2 py-xl-3 py-xl-4">
                                    <button class="fill-btn w-100 mb-2 sm-white-font " data-bs-toggle="modal"
                                            data-bs-target="#ask-a-question">Ask a Questions</button>
                                    <div class="modal fade " id="ask-a-question" tabindex="-1" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content ">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title lg-2-dark-font" id="exampleModalLabel">Ask a Question</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body py-0">
                                                    <div class="py-2">
                                                        <div class="d-flex">
                                                            <div class="question-card-img">
                                                                <img src="https://m.media-amazon.com/images/I/717aeqCigsL._SL1500_.jpg" alt=""
                                                                     class="img-fluid">
                                                            </div>
                                                            <div class="">
                                                                <p class="md-dark-bold-font ms-2 mb-3">JBL - CHARGE5 Portable Waterproof Speaker with
                                                                    Powerbank - Black</p>
                                                                <p class="md-light-font mb-4">Color: Silver</p>
                                                            </div>
                                                        </div>
                                                        <p class="sm-light-font">Question</p>
                                                        <form action="">
                                                            <textarea name="" id="" rows="4" class="form-control rounded-0"></textarea>
                                                            <div class="error-message mt-2 ">
                                                                <p class="md-red-font"> <i class="bi bi-exclamation-circle"></i> Textarea Invalid</p>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="bg-transparent border-0 me-5 sm-light-font"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" class="fill-btn sm-white-font">Submit Question</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="outlinebtn w-100 sm-green-font">See All Questions</button>
                                </div>
                                <div class=" col-md-9">
                                    <ul class="mb-0 list-unstyled customer-questions-list">
                                        <li class="py-0 py-sm-2 py-lg-3 py-xl-4">
                                            <h3 class="lg-dark-font mb-1">Q: Will the clip 3 connect to other clip 3s or clip 2s </h3>
                                            <p class="sm-light-font mb-3">Asked 2 years ago by ManOfThisCentury.</p>
                                            <p class="md-light-font mb-1">A: The Clip 3 is a standalone device. it cannot connect to a JBL
                                                Clip 2 or another Clip 3.</p>
                                            <p class="sm-light-font">Answered 2 years ago by JBL Support</p>
                                        </li>
                                        <li class="py-4">
                                            <h3 class="lg-dark-font mb-1">Q: Will the clip 3 connect to other clip 3s or clip 2s </h3>
                                            <p class="sm-light-font mb-3">Asked 2 years ago by ManOfThisCentury.</p>
                                            <p class="md-light-font mb-1">A: The Clip 3 is a standalone device. it cannot connect to a JBL
                                                Clip 2 or another Clip 3.</p>
                                            <p class="sm-light-font">Answered 2 years ago by JBL Support</p>
                                        </li>
                                        <li class="py-4">
                                            <h3 class="lg-dark-font mb-1">Q: Will the clip 3 connect to other clip 3s or clip 2s </h3>
                                            <p class="sm-light-font mb-3">Asked 2 years ago by ManOfThisCentury.</p>
                                            <p class="md-light-font mb-1">A: The Clip 3 is a standalone device. it cannot connect to a JBL
                                                Clip 2 or another Clip 3.</p>
                                            <p class="sm-light-font">Answered 2 years ago by JBL Support</p>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="row my-5 d-none d-md-block">
                            <div class="col-md-6 mx-auto">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <button class="outlinebtn w-100 sm-green-font">Show More</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="fill-btn w-100 sm-white-font" data-bs-target="#ask-a-question"
                                                data-bs-toggle="modal">Ask a Question</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="lg-2-dark-font my-4">Similar Products</h2>
                        <div class=" row about-product-detail g-0">
                            <div class="similar-products">
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1601900775.75794078.png?width=420&height=420"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img src="http://img.av-connection.com/2/AVimg_32860.jpg" alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQPx9KqU7raMidMCuDjcxhDz69C7OyL86Tn4g&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS020XeA1akvAc7bL02r3phnGAXO5cin9Eg5g&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyd34hZ3bfSNsBpQ3He_a5eCFlrhxcg0yCRA&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img src="https://3.imimg.com/data3/FR/RP/MY-1546894/mobile-bluetooth-500x500.png" alt=""
                                                 class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://w7.pngwing.com/pngs/870/26/png-transparent-iphone-7-mobile-phone-accessories-telephone-samsung-galaxy-s7-car-phone-accessory-miscellaneous-gadget-electronics.png"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img src="https://www.seekpng.com/png/detail/252-2528716_mobile-accessory-photos-png.png" alt=""
                                                 class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img src="https://www.pngplay.com/wp-content/uploads/7/Android-Mobile-Download-Free-PNG.png"
                                                 alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTqVaePQ_8dQYSGkFsZdfo8dPFHbHJnxFjCYQ&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGPk8jwv0eUABE7vcoSDaUk7GUC4itz2Eb9K1JuOvoaJi3L4k6nrYM3QbE23msxHmlmNk&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                                <div class=" product-item card  p-2">
                                    <a href="" class="">
                                        <div class="product-img mb-1">
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQN1_nD4re6Zb9opjZ1VgvbA5IHdu_UDO5WSw&usqp=CAU"
                                                alt="" class="img-fluid" />
                                        </div>
                                        <div class="product-title">
                                            <p class="sm-dark-font" style="line-height: 20px;">Skullcandy Lorem ipsumtem? Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Nobis, commodi!?</p>
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
                                            </h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <section class="email-search my-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 mx-auto">
                            <p class="md-dark-font text-center mb-2">Get the latest deals and more.</p>
                            <div class="auth">
                                <form action="">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="email" class="form-control w-75" id="email" name="email"
                                               placeholder="Enter email address" />
                                        <button class="fill-btn sm-white-font" style="width: 23%;">Sign up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class="footer-wrapper mt-3">
                    <div class="container">
                        <section class="footer-top border-bottom">
                            <div class="row">
                                <div class="col-6 col-md-4 col-lg-2 col-xl-2 ">
                                    <div class="title">
                                        <p>Shop</p>
                                    </div>
                                    <ul class="list-unstyled useful-links ">
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
                                        <a href="" class="me-3"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="social-icon">
                                        <a href="" class="me-3"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="social-icon">
                                        <a href="" class="me-3"><i class="fab fa-linkedin-in"></i></a>
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
