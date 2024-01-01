@foreach($tournaments as $tournament)

    @include('predictions.inc.league_header')

    @foreach($games as $game )

        @if($game->competition_cluster === $tournament->competition_cluster and $game->competition_name == $tournament->competition_name)
            @include('predictions.inc.league_games')
        @endif

    @endforeach

@endforeach


