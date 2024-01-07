<?php

namespace App\Http\Controllers\Front;

use App\Http\Filter\PredictionsFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Back\Prediction;
use App\Models\Back\PredictionByDate;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\DB;

class FilterController
{
    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

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

//        dd($tournaments);


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
            'request' => $request
        ]);


    }
}
