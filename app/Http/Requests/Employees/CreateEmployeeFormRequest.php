<?php

namespace App\Http\Requests\Employees;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeFormRequest extends FormRequest
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
            'employee_position_id' => 'required',
            'aadhaar' => 'nullable|regex:/[0-9]{12}/',
            'name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'social_category' => 'required',
            'religion' => 'required',
            'address' => 'required',
            'mobile' => 'required|regex:/[0-9]{10}/',
            'email' => 'required|email',
            'nature_of_appointment' => 'required',  
            'date_of_joining_in_service' => 'required',
            'highest_qualification_academic' => 'required',
            'highest_qualification_professional' => 'required',
            'classes_taught' => 'required',
            'appointed_for_subject' => 'required',
            'main_subjects_taught_subject1' => 'required',
            'main_subjects_taught_subject2' => 'required',
            'mathematics_or_science_studied_upto' => 'required',
            'english_studied_upto' => 'required',
            'social_studies_studied_upto' => 'required',   
            'working_in_present_school_since_year' => 'required'
        ];
    }
}
