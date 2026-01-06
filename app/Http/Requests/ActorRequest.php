<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActorRequest extends FormRequest
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
                'gender' =>'nullable|string|min:1',

            ];
        }
        else {
            return [
                'name' =>'required|string|min:2',
                'gender' =>'required|string|min:1',
            ]; 
        }
    }
}
