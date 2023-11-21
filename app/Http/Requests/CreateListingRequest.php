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
            return [
                'property_type' => 'required|in:building apartment,house apartment,apartment,studio,penthouse,courtyard apartment,duplex',
                'location' => 'required',
                'street' => 'required|min:3',
                'property_number' => 'nullable|min:1',
                'rooms_number' => 'required',
                'property_area' => ['required', 'min:1', 'regex:/^[1-9]\d*(\.\d+)?$/'],
                'heating' => 'required',
                'floor' => 'required',
                'total_floors' => 'required',
                'price' => ['required', 'regex:/^(?:0|[1-9]\d*)(?:\.\d+)?$/'],
                'deposit' => ['nullable', 'regex:/^(?:0|[1-9]\d*)(?:\.\d+)?$/'],
                'payment_schedule' => 'required',
                'available_now' => 'nullable|in:1',
                'garage_space' => ['nullable', 'regex:/^[1-9]\d*(\.\d+)?$/'],
                'description' => 'nullable|min:5',
                'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
            ];
        }
    }
}
