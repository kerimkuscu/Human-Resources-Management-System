<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLeaveTypeFormRequest extends FormRequest
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
            'leave_type'     => 'required|min:5',
            'leaves_per_day' => 'required|min:0|integer',
        ];
    }
}
