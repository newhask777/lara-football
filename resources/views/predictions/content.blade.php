<div class="col-span-8 ml-2 mr-2 mt-1 max-w-[100%]">
    <!-- Mian Banner -->
    {{--    {% include 'layouts/main_banner.html' %}--}}
    @include('predictions.banner')
    <!-- end Main Banner -->
    <!-- Matches Carts -->
    <div class="match_cart bg-white mb-2 rounded-md">

        <!-- Card Header -->
        @include('predictions.cart_header')
        <!-- end Card Header -->

        <!-- Card Filter -->
        @include('predictions.filter')
        <!-- end Card Header -->

        <!-- Games By League -->
        <div id="content" class="pl-4 pr-4 pb-1 pt-2 rounded-md ">

            @include('predictions.inc.row')

        </div>

    </div>
    <!-- end Matches cart -->
</div>
