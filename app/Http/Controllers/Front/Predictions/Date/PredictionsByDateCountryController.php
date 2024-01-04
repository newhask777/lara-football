<?php

namespace App\Http\Controllers\Front\Predictions\Date;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PredictionsByDateCountryController extends Controller
{
        public function __invoke(Request $request, $date, $country)
    {
//        dd($date);

        $games = DB::table('predictions_by_dates')
            ->select('*')
            ->where('date', $date)
            ->where('competition_cluster', $country)
            ->get();

        $tournaments = DB::table('predictions_by_dates')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('date', $date)
            ->where('competition_cluster', $country)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions_by_dates')
            ->select('federation')
            ->where('date', $date)
            ->where('competition_cluster', $country)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions_by_dates')
            ->select('competition_cluster')
            ->where('date', $date)
            ->where('competition_cluster', $country)
            ->distinct('competition_cluster')
            ->get();

        $leagues = DB::table('predictions_by_dates')
            ->select('competition_name', 'competition_cluster')
            ->where('date', $date)
            ->where('competition_cluster', $country)
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

        $temp = 'predictions';
        $type = 'date';

        $currentDate = $date;

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
            'request' => $request
        ]);
    }
}
