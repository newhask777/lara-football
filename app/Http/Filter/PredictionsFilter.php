<?php


namespace App\Http\Filter;


use Illuminate\Database\Eloquent\Builder;

class PredictionsFilter extends AbstractFilter
{
    public const DATE = 'date';
    public const STATUS = 'status';


    protected function getCallbacks(): array
    {
        return [
            self::DATE => [$this, 'date'],
            self::STATUS => [$this, 'status'],
        ];
    }

    public function date(Builder $builder, $value)
    {
        $builder->where('date', $value);
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', $value);
    }

}
