<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'school_session_id' => 'required',
            'school_class_id' => 'required',
            'section_id' => 'required',
            'aadhaar' => 'nullable|regex:/[0-9]{12}/',
            'name' => 'required',
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'social_category' => 'required',
            'religion' => 'required',
            'mother_tongue' => 'required',
            'address' => 'required',
            'is_bpl' => 'required',
            'is_disadvantage_group' => 'required',
            'is_getting_free_education' => 'required',
            'is_homeless' => 'required',
            'last_examination' => 'required',
            'percentage_of_marks_obtained' => 'required|numeric',
            'bank_account_number' => 'required',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'mobile' => 'required|regex:/[0-9]{10}/',
            'email' => 'required|email',
        ];
    }
}
