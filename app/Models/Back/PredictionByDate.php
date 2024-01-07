<?php

namespace App\Models\Back;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionByDate extends Model
{
    use Filterable;

    protected $table = 'predictions_by_dates';
    protected $guarded = false;

    protected function odds(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
