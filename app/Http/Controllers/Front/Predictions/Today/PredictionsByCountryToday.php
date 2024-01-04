<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PredictionsByCountryToday extends Controller
{
    public function __invoke($country)
    {
        $games = DB::table('predictions')
            ->select('*')
            ->where('competition_cluster', $country)
            ->get();

        $tournaments = DB::table('predictions')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('competition_cluster', $country)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions')
            ->select('federation')
            ->where('competition_cluster', $country)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions')
            ->select('competition_cluster')
            ->where('competition_cluster', $country)
            ->distinct('competition_cluster')
            ->get();

        $leagues = DB::table('predictions')
            ->select('competition_name', 'competition_cluster')
            ->where('competition_cluster', $country)
            ->distinct('competition_name')
            ->get();

//        dd($games);

        $temp = 'predictions';
        $type = 'country-today';

        $currentDate = date('Y-m-d');


        return view('predictions.main', [
            'games' => $games,
            'temp' => $temp,
            'type' => $type,
            'tournaments' => $tournaments,
            'federations' => $federations,
            'country' => $country,
            'countries' => $countries,
            'leagues' => $leagues,
            'date' => $currentDate,
        ]);
    }
}
