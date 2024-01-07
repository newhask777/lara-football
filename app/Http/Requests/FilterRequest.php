<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
//            'event_id' => 'integer',
//            'competition_name' => ['string', 'nullable'],
//            'competition_cluster' => ['string', 'nullable'],
//            'federation' => ['string', 'nullable'],
//            'season' => ['string', 'nullable'],
            'date' => ['date', 'nullable'],
//            'start_date' => ['string', 'nullable'],
//            'time' => ['string', 'nullable'],
//            'home_team' => ['string', 'nullable'],
//            'away_team' => ['string', 'nullable'],
            'status' => ['string', 'nullable'],
//            'result' => ['string', 'nullable'],
//            'prediction' => ['string', 'nullable'],
//            'is_expired' => ['string', 'nullable'],
//            'odds' => ['json', 'nullable'],
        ];
    }
}
