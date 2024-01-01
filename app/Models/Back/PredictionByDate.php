<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionByDate extends Model
{
    protected $table = 'predictions_by_dates';
    protected $guarded = false;
}
