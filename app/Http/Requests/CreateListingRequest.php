<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class CreateListingRequest extends FormRequest
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
        $transaction = Session::get('listing_type')['transaction'];
        $property = Session::get('listing_type')['property'];

        if ($transaction === 'sell' && $property === 'house') {
            return [

            ];
        }
        else if ($transaction === 'sell' && $property === 'apartment') {
            return [

            ];
        }
        else if ($transaction === 'rent' && $property === 'house') {
            return [

            ];
        }
        else {
            return config('validations.rentApartment');
        }
    }
}
