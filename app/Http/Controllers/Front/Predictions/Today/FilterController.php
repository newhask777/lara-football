<?php

namespace App\Http\Controllers\Front\Predictions\Today;

use App\Http\Filter\PredictionsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Back\Prediction;
use App\Models\Back\PredictionByDate;
use Illuminate\Contracts\Container\BindingResolutionException;

class FilterController
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

//        dd($data);

        $filter = app()->make(PredictionsFilter::class, ['queryParams' => array_filter($data)]);

        $games = Prediction::filter($filter)->get();


        $tournaments = Prediction::select('competition_cluster','competition_name', 'federation')
            ->distinct('competition_cluster')
            ->distinct('competition_name')
            ->distinct('federation')
            ->get();

        $federations = Prediction::select('federation')
            ->distinct('federation')
            ->get();

        $countries = Prediction::select('competition_cluster')
            ->distinct('competition_cluster')
            ->get();

        $leagues = Prediction::select('competition_name', 'competition_cluster')
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

        $dates = PredictionByDate::select('date')
            ->distinct('date')
            ->get();

        dd($dates);

        $temp = 'filter';
        $type = 'filter-today';

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
            'dates' => $dates,
            'request' => $request
        ]);


    }
}
