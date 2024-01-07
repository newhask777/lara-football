<?php

namespace App\Http\Controllers\Front;

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

        $filter = app()->make(PredictionsFilter::class, ['queryParams' => array_filter($data)]);

        $predictions = PredictionByDate::filter($filter)->get();

        dd($predictions);
    }
}
