<?php

namespace App\Http\Controllers\Front\Predictions;

use App\Http\Controllers\Controller;
use App\Models\Back\Prediction;
use Illuminate\Support\Facades\DB;

class PredictionsTodayController extends Controller
{
    public function __invoke()
    {
        $games = DB::table('predictions')
            ->select('*')
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
