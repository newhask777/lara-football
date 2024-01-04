<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PredictionsByLeagueToday extends Controller
{
    public function __invoke($league)
    {
        $games = DB::table('predictions')
            ->select('*')
            ->where('competition_name', $league)
            ->get();

        $tournaments = DB::table('predictions')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('competition_name', $league)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions')
            ->select('federation')
            ->where('competition_name', $league)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions')
            ->select('competition_cluster')
            ->where('competition_name', $league)
            ->distinct('competition_cluster')
            ->get();

        $leagues = DB::table('predictions')
            ->select('competition_name', 'competition_cluster')
            ->where('competition_name', $league)
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

//        dd($leagues);

        $temp = 'predictions';
        $type = 'league-today';

        $currentDate = date('Y-m-d');


        return view('predictions.main', [
            'games' => $games,
            'temp' => $temp,
            'type' => $type,
            'tournaments' => $tournaments,
            'federations' => $federations,
            'league' => $league,
            'leagues' => $leagues,
            'countries' => $countries,
            'date' => $currentDate,
        ]);
    }
}
