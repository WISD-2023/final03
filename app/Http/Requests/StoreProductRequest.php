<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'category_id' => 'required|integer',
			'amount' => 'required|integer',
			'price' => 'required|integer',
			'is_display' => 'required|integer|between:0,1',
			'photo_url' => 'required',
			'format' => 'required',
			'description' => 'required',
			'name' => 'required',
        ];
    }
}
