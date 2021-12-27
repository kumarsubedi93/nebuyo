<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <header class="header">
                <section class="top-header">
                    <nav class="navbar navbar-expand-md">
                        <div class="">
                            <a class="navbar-brand" href="{!! route('site.home.index') !!}"
                            ><span class="logo-icon"
                                ><i class="fas fa-shopping-bag"></i
                                    ></span>
                                Nebuyo</a
                            >
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="d-block d-md-none nav-icon me-3">
                                <i
                                    class="bi bi-search"
                                    type="button"
                                    id="search-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#search-modal"
                                ></i>
                            </div>
                            <div class="d-block d-md-none nav-icon d-block d-md-none">
                                <i class="bi bi-cart3 me-3"></i>
                            </div>
                            <div
                                class="menu-btn d-block d-md-none"
                                onclick="myFunction(this)"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </div>
                        <div
                            class="modal"
                            id="search-modal"
                            tabindex="-1"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="res-serch-box" id="open-search-box">
                                            <form class="">
                                                <label for="res-search" class="nav-res-label">
                                                    <i class="bi bi-search"></i>
                                                </label>
                                                <div
                                                    class="
                                d-flex
                                justify-content-between
                                align-items-center
                              "
                                                >
                                                    <input
                                                        class="form-control"
                                                        style="width: 90%"
                                                        type="text"
                                                        type="search"
                                                        placeholder="Search"
                                                        aria-label="Search"
                                                    />
                                                    <button
                                                        type="button"
                                                        id="res-search"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="collapse navbar-collapse"
                            id="navbarSupportedContent"
                        >
                            <ul class="navbar-nav py-3 py-lg-0">
                                <li class="nav-item dropdown nav-item-margin-left">
                                    <a
                                        class="nav-link category-label active"
                                        href="#"
                                        id="navbarDropdown "
                                        role="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                        <span class="category-icon"
                        ><i class="bi bi-list"></i
                            ></span>
                                        Categories
                                    </a>
                                    <!-- <ul class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item mb-4" href="#">My Profile</a></li>
                                  <li><a class="dropdown-item mb-4" href="#">My Address Book</a></li>
                                  <li><a class="dropdown-item mb-3" href="#">My Orders and Purchases</a></li>
                                  <li><a class="dropdown-item mb-3" href="#">My Reviews</a></li>
                                </ul> -->
                                </li>
                                @if($parent_categories->count())
                                    @foreach ($parent_categories as $key => $category)
                                        <li class="d-block d-md-none nav-item">
                                            <a class="nav-link" aria-current="page"
                                               href="{{ route('site.home.category',$category->slug) }}"
                                            >{{ __($category->name) }}</a
                                            >
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="res-authentication d-block d-md-none border-top">
                                <div class="mb-2">
                                    <p>Login to see your account, orders and more.</p>
                                    <p>Dont have an account? Create one now.</p>
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <button class="res-authentication-btn fill-btn w-100">
                                            Login
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <button class="res-authentication-btn outlinebtn w-100">
                                            Create Account
                                        </button>
                                    </div>
                                </div>
                                <ul
                                    class="list-unstyled mb-0 mt-3"
                                    aria-labelledby="navbarDropdown"
                                >
                                    <li>
                                        <a
                                            class="mb-2 sm-dark-font text-decoration-none"
                                            href="#"
                                        >My Profile</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="mb-2 sm-dark-font text-decoration-none"
                                            href="#"
                                        >My Address Book</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            class="mb-2 sm-dark-font text-decoration-none"
                                            href="#"
                                        >My Orders and Purchases</a
                                        >
                                    </li>
                                    <li>
                                        <a class="sm-dark-font text-decoration-none" href="#"
                                        >My Reviews</a
                                        >
                                    </li>
                                </ul>
                            </div>

                            <div
                                class="
                      col-5
                      search-form
                      nav-item-margin-left
                      d-none d-md-block
                    "
                            >
                                <form class="">
                                    <label for="search" class="nav-lg-label">
                                        <i class="bi bi-search"></i>
                                    </label>
                                    <input
                                        class="form-control w-100 border-1"
                                        id="search"
                                        type="text"
                                        type="search"
                                        placeholder="Search"
                                        aria-label="Search"
                                    />
                                </form>
                            </div>
                        </div>
                        <div class="d-none d-md-block">
                            <div class="d-flex justify-content-end align-items-center">
                                <div
                                    class="dropdown dropstart nav-icon d-none d-md-block me-3"
                                >
                                    <i
                                        class="bi bi-person-circle"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    ></i>
                                    <ul
                                        class="dropdown-menu shadow-lg user-auth mt-4"
                                        aria-labelledby="navbarDropdown"
                                    >
                                        <li>
                                            <a class="dropdown-item mb-2" href="#">My Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item mb-2" href="#"
                                            >My Address Book</a
                                            >
                                        </li>
                                        <li>
                                            <a class="dropdown-item mb-2" href="#"
                                            >My Orders and Purchases</a
                                            >
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">My Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="nav-icon d-none d-md-block">
                                    <i class="bi bi-cart3"></i>
                                </div>
                            </div>
                        </div>
                    </nav>
                </section>
                <section class="bottom-header mt-1 mt-lg-3">
                    <div class="d-none d-md-block">
                        <ul
                            class="
                    list-unstyled
                    col-sm-12 col-md-8 col-lg-6 col-xl-5
                    ms-4
                  "
                        >
                            @if($parent_categories->count())
                                @foreach ($parent_categories as $key => $category)
                                    <li>
                                        <a href="{{ route('site.home.category',$category->slug) }}">{{ __($category->name) }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </section>
            </header>
        </div>
    </div>
</div>
