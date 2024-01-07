@if($type == 'today' or $type == 'date')
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
@endif

@if($type == 'filter-today' or $type == 'date')
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
@endif


@if($type == 'country-today')
    @foreach($tournaments as $tournament)
        @if($tournament->competition_cluster == $country)
            @include('predictions/inc/league_header')
        @endif

        <div id="cart_league_body" class="open">
            @foreach($games as $game)
                @if($game->federation === $tournament->federation and $game->competition_cluster == $tournament->competition_cluster)
                    @include('predictions/inc/league_games')
                @endif
            @endforeach
        </div>

    @endforeach
@endif


@if($type == 'federation-today')
    @foreach($tournaments as $tournament)
        @if($tournament->federation == $federation)
            @include('predictions/inc/league_header')
        @endif

        <div id="cart_league_body" class="open">
            @foreach($games as $game)
                @if($game->federation === $tournament->federation and $game->competition_cluster == $tournament->competition_cluster)
                    @include('predictions/inc/league_games')
                @endif
            @endforeach
        </div>

    @endforeach
@endif


@if($type == 'league-today')
    @foreach($tournaments as $tournament)
        @if($tournament->competition_name == $league)
            @include('predictions/inc/league_header')
        @endif

        <div id="cart_league_body" class="open">
            @foreach($games as $game)
                @if($game->competition_name === $tournament->competition_name and $game->competition_cluster == $tournament->competition_cluster)
                    @include('predictions/inc/league_games')
                @endif
            @endforeach
        </div>

    @endforeach
@endif


