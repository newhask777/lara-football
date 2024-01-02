<div class="left_sidebar col-span-2 mt-1 bg-white rounded-md pt-2 pb-2">

    <div class="pb-3">
        <div class="p-2 pl-2 pr-2  rounded-t-md">
            <div class="flex ml-auto mr-auto pl-4 pr-4">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="" class="w-4 h-4 mt-auto mb-auto">
                <span class="ml-2 text-sm font-bold mt-auto mb-auto">By Federation</span>
            </div>
        </div>

        <ul class="ml-6 mr-6  mt-4 border-l border-r text-xs  font-bold">

            @foreach($federations as $federation)

                    <li class="p-2 bg-white hover:bg-gray-200">

                        <a href="/predictions/today/{{ $federation->federation }}" class="flex">

                            <img class="w-5 mt-auto mb-auto rounded-full bg-gray-200"
                                 src="{{ asset('/logos/'. $federation->federation .'.png') }}"
                                 alt="">
                            <span class="ml-2">
                                {{ $federation->federation }}
                            </span>


                        </a>
                    </li>

            @endforeach

        </ul>
    </div>


    <div class="pb-3">
        <div class="p-2 pl-2 pr-2  rounded-t-md">
            <div class="flex ml-auto mr-auto pl-4 pr-4">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="" class="w-4 h-4 mt-auto mb-auto">
                <span class="ml-2 text-sm font-bold mt-auto mb-auto">By Country</span>
            </div>
        </div>

        <ul class="ml-6 mr-6  mt-4 border-l border-r text-xs  font-bold">

            @foreach($countries as $country)

            <li class="p-2 bg-white hover:bg-gray-200">

                <a href="/predictions/today/cluster/{{ $country->competition_cluster }}" class="flex">

                    <img class="w-5 mt-auto mb-auto rounded-full bg-gray-200"
                         src="https://flagdownload.com/wp-content/uploads/Flag_of_{{$country->competition_cluster}}_Flat_Round-1024x1024.png"
                         alt="">
                    <span class="ml-2">
                        {{ $country->competition_cluster }}
                    </span>

                </a>
            </li>

            @endforeach

        </ul>

    </div>
</div>
