<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstName' => ['required', 'min:3', 'max:10', 'string'],
            'lastName' => ['required', 'min:3', 'max:10', 'string'],
            'age' => ['required', 'numeric', 'gte:23', 'lte:60'],
            'job' => ['required', 'string'],
        ];
    }

    public function attributes() : array
    {
        return [
            'firstName' => 'First Name',
            "lastName" => "Last Name",
            "age" => "Age",
            "job" => "Job",
            "city" => "City",
        ];
    }
}
