<?php

namespace App\Http\Requests\FiscalYear;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreFiscalYearRequest extends FormRequest
{

    public function authorize()
    {
        return  Gate::allows('fiscal_year_create');
    }

    public function rules()
    {
        return [
          'year' => ['required', 'regex:/^(20\d{2})[-\/](\d{2})$/'],
        ];
    }
}
