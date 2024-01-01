<div class="league_games_item flex flex-row justify-between border-b last:border-none bg-white p-3 hover:bg-gray-100">
    <!-- Time & Star -->
    <div class="w-1/6 flex flex-row items-center">
        <div class="home_team">
            <span class="star">
                <a href="" class="hover:bg-lime-200">
                    <img src="{{ asset('/assets/images/star.svg') }}" alt="" class="align-middle inline-block">
                </a>
            </span>
            <span class="time ml-4 pt-1 text-xs font-bold">
                {{ $game->time }}
            </span>
        </div>
    </div>
    <!-- End Time & Star -->
    <!-- Teams -->
    <a href="#" class="flex w-4/6 flex flex-row justify-between">
        <div class="flex home_team w-5/12">
            <div class="rounded-full  p-1 mt-auto mb-auto">
                <img src="" alt="" class="w-4 mt-auto mb-auto">
            </div>
            <span class="team_name ml-1 inline-block mt-auto mb-auto text-xs font-bold font-bold">{{ $game->home_team }}</span>
        </div>
        <!-- Result -->
        <div class="result  flex justify-center">

            @if($game->result != "")
                <span class="inline-block align-middle text-xs font-bold m-auto rounded-md border pl-4 pr-4 pt-1 pb-1">
                    {{ $game->result }}
                </span>
            @else
                <span class="inline-block align-middle text-xs font-bold m-auto  pl-4 pr-4 pt-1 pb-1">
                    vs
                </span>
            @endif

        </div>
        <div class="away_team w-5/12 flex justify-end">
            <span class="team_name mr-2 inline-block mt-auto mb-auto text-xs font-bold font-bold">{{ $game->away_team }}</span>
            <div class="rounded-full  p-1 mt-auto mb-auto">
                <img src="" alt="" class="w-4 mt-auto mb-auto">
            </div>
        </div>
    </a>

    <!-- Stat -->
    <div class="statistics w-1/6 flex flex-row justify-end">
        <div class="flex items-center">
            <div class="flex mt-auto mb-auto">
                    <span class="inline-block align-middle text-xs mt-auto mb-auto">
                        <a href="">
                            <div class="font-bold">{{ $game->prediction }}</div>
                        </a>
                    </span>
                <span>:</span>
                <span class="text-xs font-bold mt-auto mb-auto ml-1">

                </span>
            </div>
            <span class="inline-block align-middle text-xs ml-1">
                <a href="">
                    @if($game->status === "won")

                        <img src="{{ asset('/assets/images/win.png') }}" alt="" class="w-4">

                    @elseif ($game->status == 'lost')

                        <img src="{{ asset('/assets/images/Red_x.svg') }}" alt="" class="w-4">

                    @elseif ($game->status == 'draw')

                        <img src="{{ asset('/assets/images/equal.png') }}" alt="" class="w-4">

                    @else

                        {{ $game->status }}

                    @endif
                </a>
            </span>
        </div>
    </div>

</div>

<!-- end item -->

