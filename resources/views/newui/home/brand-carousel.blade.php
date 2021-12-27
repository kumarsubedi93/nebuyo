<div class="container mb-8">
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
            @foreach($brands as $brand)
                <div class="js-slide">
                    <a href="#" class="link-hover__brand">
                        <img class="img-fluid m-auto max-height-50"
                             src="{{ my_asset($brand->logo) }}"
                             alt="{{ $brand->name }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
