<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
        <ul class="row list-unstyled products-group no-gutters">
            @include('newui.home.partials.search.first_view', ['products' => $products])
        </ul>
    </div>
    <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
        <ul class="row list-unstyled products-group no-gutters">
{{--            @include('newui.home.partials.search.second_view', ['products' => $products])--}}
        </ul>
    </div>
    <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
        <ul class="d-block list-unstyled products-group prodcut-list-view">
{{--            @include('newui.home.partials.search.third_view', ['products' => $products])--}}
        </ul>
    </div>
    <div class="tab-pane fade pt-2" id="pills-four-example1" role="tabpanel" aria-labelledby="pills-four-example1-tab" data-target-group="groups">
        <ul class="d-block list-unstyled products-group prodcut-list-view-small">
{{--            @include('newui.home.partials.search.four_view', ['products' => $products])--}}
        </ul>
    </div>

    @if(!count($products))
        <div style="text-align: center;">
        <h5>No record found</h5>
        </div>
    @endif
</div>

@if(count($allProducts))
    <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
        <div class="text-center text-md-left mb-3 mb-md-0">Showing {{ $number }}–{{ count($products) }} of {{count($allProducts)}} results</div>
        @if(count($allProducts) > $limit)
            <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                {{ $products->links() }}
            </ul>
        @endif
    </nav>
@endif

