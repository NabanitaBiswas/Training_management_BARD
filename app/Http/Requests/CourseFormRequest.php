<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Course;


class CourseFormRequest extends Request
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
        'course_name'    => 'required|min:3',
        'introduction'   => 'required|min:10',
		'objectives'     => 'required|min:3',
		'course_contents'=> 'required|min:3',
		'training_methods'=> 'required|min:3',
        'participants' => 'required|min:3',
        'duration' => 'required|min:3',
        'academic_staff' => 'required|min:3',
        'course_fee' => 'required|min:3',
        'accommodation_and_food' => 'required|min:3',
        'library' => 'required|min:3',
        'award' => 'required|min:3',
        'address_for_correspondence' => 'required|min:3',
        'training_id' => 'required'
       
    ];
    }
}
