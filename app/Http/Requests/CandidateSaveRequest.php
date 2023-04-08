<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;

class CandidateSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'job_id' => 'required|integer|exists:jobs,id',
            'email' => 'required|string|unique:candidates,email|email',
            'phone' => 'required|string|unique:candidates,phone|regex:/^([0-9\s\.\-\+\(\)]*)$/|min:10',
            'year' => 'required|integer',
            'skill_ids' => 'required|array',
            'skill_ids.*' => 'exists:skills,id'
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $skill_ids = explode(",", $this->skill_ids);
        $this->merge([
            'skill_ids'   =>   $skill_ids,
        ]);
    }
}
