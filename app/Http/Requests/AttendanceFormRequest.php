<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceFormRequest extends FormRequest
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
            'employee_id'          => 'required',
            'time_in_date'         => 'required',
            'time_in_time_hour'    => 'required|max:24|min:0',
            'time_in_time_minute'  => 'required|max:60|min:0',
            'time_out_date'        => 'required',
            'time_out_time_hour'   => 'required|max:24|min:0',
            'time_out_time_minute' => 'required|max:60|min:0',
        ];
    }
}
