<?php

namespace App\Http\Controllers\Front\Predictions\Date;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PredictionsByDateController extends Controller
{
    public function __invoke(Request $request, $date)
    {
//        dd($date);

        $games = DB::table('predictions_by_dates')
            ->select('*')
            ->where('date', $date)
            ->get();

        $tournaments = DB::table('predictions_by_dates')
            ->select('competition_cluster','competition_name', 'federation')
            ->where('date', $date)
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = DB::table('predictions_by_dates')
            ->select('federation')
            ->where('date', $date)
            ->distinct('federation')
            ->get();

        $countries = DB::table('predictions_by_dates')
            ->select('competition_cluster')
            ->where('date', $date)
            ->distinct('competition_cluster')
            ->get();

        $leagues = DB::table('predictions_by_dates')
            ->select('competition_name', 'competition_cluster')
            ->where('date', $date)
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();


//        dd($leagues);
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
            'leagues' => $leagues,
            'date' => $currentDate,
            'request' => $request
        ]);
    }
}
