<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PredictionsByFederationToday extends Controller
{
    public function __invoke($federation)
    {
        $games = DB::table('predictions')
            ->select('*')
            ->where('federation', $federation)
            ->get();

        $tournaments = DB::table('predictions')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('federation', $federation)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions')
            ->select('federation')
            ->where('federation', $federation)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions')
            ->select('competition_cluster')
            ->where('federation', $federation)
            ->distinct('competition_cluster')
            ->get();

        $leagues = DB::table('predictions')
            ->select('competition_name', 'competition_cluster')
            ->where('federation', $federation)
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

//        dd($games);

        $temp = 'predictions';
        $type = 'federation-today';

        $currentDate = date('Y-m-d');


        return view('predictions.main', [
            'games' => $games,
            'temp' => $temp,
            'type' => $type,
            'tournaments' => $tournaments,
            'federations' => $federations,
            'federation' => $federation,
            'countries' => $countries,
            'leagues' => $leagues,
            'date' => $currentDate,
        ]);
    }
}
