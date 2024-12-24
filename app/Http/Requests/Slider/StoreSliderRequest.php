<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreSliderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $data = [
            'title' => ['nullable'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg']
        ];

        if (config('default.dual_language')) {
            $data = array_merge($data, [
                'title_en' => ['nullable'],
            ]);
        }
        return $data;

    }
}
