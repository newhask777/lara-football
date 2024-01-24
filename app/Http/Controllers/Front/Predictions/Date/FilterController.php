<?php

namespace App\Http\Controllers\Front\Predictions\Date;

use App\Http\Filter\PredictionsFilter;
use App\Http\Requests\FilterRequest;
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

//        dd($request->date);

        $filter = app()->make(PredictionsFilter::class, ['queryParams' => array_filter($data)]);

        $games = PredictionByDate::filter($filter)->get();

        $tournaments = PredictionByDate::filter($filter)->get();

//        $tournaments = PredictionByDate::select('competition_cluster','competition_name', 'federation')
//            ->where('date', $request->date)
//            ->distinct('competition_cluster')
//            ->distinct('competition_name')
//            ->distinct('federation')
//            ->get();

        $federations = PredictionByDate::select('federation')
            ->where('date', $request->date)
            ->distinct('federation')
            ->get();

        $countries = PredictionByDate::select('competition_cluster')
            ->where('date', $request->date)
            ->distinct('competition_cluster')
            ->get();

        $leagues = PredictionByDate::select('competition_name', 'competition_cluster')
            ->where('date', $request->date)
            ->distinct('competition_name')
            ->distinct('competition_cluster')
            ->get();

        $dates = PredictionByDate::select('date')
            ->distinct('date')
            ->get();

//        dd($tournaments);

        $temp = 'filter';
        $type = 'filter';

        $currentDate = $request->date;

//        dd($currentDate);


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
