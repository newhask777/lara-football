<?php

namespace App\Http\Controllers\Front\Predictions;

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
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions')
            ->select('federation')
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions')
            ->select('competition_cluster')
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
            'date' => $currentDate,
        ]);
    }
}
