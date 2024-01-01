<?php

namespace App\Http\Controllers\Front\Predictions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PredictionsByDateController extends Controller
{
    public function __invoke()
    {
        $games = DB::table('predictions_by_dates')
            ->select('*')
            ->get();

        $tournaments = DB::table('predictions_by_dates')
            ->select('competition_cluster','competition_name', 'federation')
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions_by_dates')
            ->select('federation')
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions_by_dates')
            ->select('competition_cluster')
            ->distinct('competition_cluster')
            ->get();

//        dd($federations);

        $temp = 'predictions';
        $type = 'today';

        $currentDate = date('Y-m-d');


        return view('predictions.today', [
            'games' => $games,
            'temp' => $temp,
            'type' => $type,
            'tournaments' => $tournaments,
            'federations' => $federations,
            'countries' => $countries,
            'currentDate' => $currentDate,
        ]);
    }
}
