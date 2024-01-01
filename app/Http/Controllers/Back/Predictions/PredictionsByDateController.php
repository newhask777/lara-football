<?php

namespace App\Http\Controllers\Back\Predictions;

use App\Http\Controllers\Controller;
use App\Models\Back\PredictionByDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionsByDateController extends Controller
{
    public function __invoke($date)
    {

        PredictionByDate::truncate();

        $response = Http::get("http://127.0.0.1:8001/api/predictions/date/${date}");
        $games = $response->json($key = null, $default = null);

        foreach ($games as $game)
        {
            PredictionByDate::create([
                'event_id' => $game['event_id'],
                'competition_name' => $game['competition_name'],
                'competition_cluster' => $game['competition_cluster'],
                'federation' => $game['federation'],
                'season' => $game['season'],
                'date' => $game['date'],
                'start_date' => $game['start_date'],
                'time' => $game['time'],
                'home_team' => $game['home_team'],
                'away_team' => $game['away_team'],
                'status' => $game['status'],
                'result' => $game['result'],
                'prediction' => $game['prediction'],
                'is_expired' => $game['is_expired'],
//                'odds' => $game['odds'],
            ]);
        }
    }
}
