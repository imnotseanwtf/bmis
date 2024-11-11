<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // REQUEST DOCUMENT
            'document_name' => ['required', 'string'],

            // BARANGAY CLEARANCE
            'is_certified' => ['nullable', 'string'],
            'purpose' => ['nullable', 'string'],

            // BUSINESS PERMIT
            'nature_of_business' => ['nullable', 'string', 'max:255'],
            'proprietor' => ['nullable', 'string', 'max:255'],
            'permit_number' => ['nullable', 'string', 'max:255', 'unique:business_permits,permit_number'],
            'address' => ['nullable', 'string', 'max:500'],
            'business_location' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'in:active,inactive'],

            // CERTIFICATE OF INDIGENCY
            'subject' => ['nullable', 'string'],

            // COMPLAINT
            'complainant' => ['nullable', 'string', 'max:255'],
            'against' => ['nullable', 'string', 'max:255'],
            'respondents' => ['nullable', 'string', 'max:255'],

            // MEDIC
            'medical_facility' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date',],
            'medical_conditions' => ['nullable', 'string'],
            'time_of_arrival' => ['nullable', 'date_format:H:i'],
            'brought_by' => ['nullable', 'string', 'max:255'],
            'relationship' => ['nullable', 'string', 'max:255'],
            'start' => ['nullable', 'integer', 'min:1'],
            'end' => ['nullable', 'integer', 'min:1'],

        ];
    }
}
