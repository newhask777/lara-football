<div class="col-span-8 ml-2 mr-2 mt-1 max-w-[724px]">
    <!-- Mian Banner -->
    {{--    {% include 'layouts/main_banner.html' %}--}}
    <!-- end Main Banner -->
    <!-- Matches Carts -->
    <div class="match_cart bg-white mb-2 rounded-md">

        <!-- Cart Header -->
        @include('predictions.cart_header')
        <!-- end Cart Header -->

        <!-- Games By League -->
        <div id="content" class="pl-4 pr-4 pb-1 pt-2 rounded-md ">

            @include('predictions.inc.row')

        </div>

    </div>
    <!-- end Matches cart -->
</div>
