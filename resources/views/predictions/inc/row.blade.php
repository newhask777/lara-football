@foreach($tournaments as $tournament)

    @include('predictions/inc/league_header')

    <div id="cart_league_body" class="open">
        @foreach($games as $game)
            @if($game->competition_cluster === $tournament->competition_cluster and $game->competition_name == $tournament->competition_name)
                @include('predictions/inc/league_games')
            @endif
        @endforeach
    </div>

@endforeach


