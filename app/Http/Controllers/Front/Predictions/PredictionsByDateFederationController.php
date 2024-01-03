<?php

namespace App\Http\Controllers\Front\Predictions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PredictionsByDateFederationController extends Controller
{
    public function __invoke(Request $request, $date, $federation)
    {
//        dd($date);

        $games = DB::table('predictions_by_dates')
            ->select('*')
            ->where('date', $date)
            ->where('federation', $federation)
            ->get();

        $tournaments = DB::table('predictions_by_dates')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('date', $date)
            ->where('federation', $federation)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions_by_dates')
            ->select('federation')
            ->where('date', $date)
            ->where('federation', $federation)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions_by_dates')
            ->select('competition_cluster')
            ->where('date', $date)
            ->where('federation', $federation)
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
            'countries' => $countries,
            'date' => $currentDate,
            'request' => $request
        ]);
    }
}
