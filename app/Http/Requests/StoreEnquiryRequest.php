<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'regex:/^[0-9\s\+\-\(\)]+$/'],
            'email' => ['nullable', 'email', 'max:255'],
            'town' => ['required', 'string', 'max:255'],
            'bathroom_type' => ['required', 'in:Wet wall,Tiled,Not sure yet'],
            'best_time_to_call' => ['nullable', 'in:Any time,Morning,Afternoon,Evening'],
            'message' => ['nullable', 'string', 'max:2000'],
            'website' => ['nullable', 'string'], // Honeypot field - must be empty
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'phone.required' => 'Please enter a phone number.',
            'phone.min' => 'Please enter a full phone number with at least 10 digits.',
            'phone.regex' => 'Please enter a valid phone number.',
            'email.email' => 'Please enter a valid email address.',
            'town.required' => 'Please enter your town or postcode.',
            'bathroom_type.required' => 'Please select a bathroom type.',
            'website.required' => 'Spam detected.', // Honeypot - should never fire
        ];
    }
}
