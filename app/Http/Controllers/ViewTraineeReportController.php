<?php

namespace App\Http\Controllers;

use App\Course;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ViewTraineeReportController extends Controller
{
    public function select_training()
    {
        $trainings = Training::all();
        return view('view_trainee_report/select_training')->with('trainings', $trainings);
    }
    public function select_course($training_id)
    {
        $courses = Course::whereTraining_id($training_id)->get();
        return view('view_trainee_report/select_course')->with('courses', $courses);
    }

    public function view_trainee_report($course_id)
    {
        return view('view_trainee_report/all_report')->with('course_id', $course_id);
    }
}
