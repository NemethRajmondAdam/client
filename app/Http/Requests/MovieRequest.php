<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        if ($this->method() == 'PATCH') {
            return [
                'name' =>'nullable|string|min:2',
                'categories_id' =>'nullable|numeric',
                'description' =>'nullable|string|min:6',
                'pic_path' => 'nullable|string',
                'length' =>'nullable|string|min:2',
                'release_date'=>'nullable|string|min:4',
                'director_id'=>'nullable|numeric',
            ];
        }
        else {
            return [
                'name' =>'required|string|min:2',
                'categories_id' =>'required|numeric',
                'description' =>'required|string|min:6',
                'pic_path' => 'nullable|string',
                'length' =>'required|string|min:2',
                'release_date'=>'required|string|min:4',
                'director_id'=>'required|numeric',
            ]; 
        }
    }
}
