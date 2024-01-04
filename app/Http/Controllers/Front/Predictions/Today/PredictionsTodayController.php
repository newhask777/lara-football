<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PredictionsTodayController extends Controller
{
    public function __invoke(Request $request)
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

        $leagues = DB::table('predictions')
            ->select('competition_name', 'competition_cluster')
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

//        dd($leagues);


        $temp = '$leagues';
        $type = 'today';

        $currentDate = date('Y-m-d');


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
