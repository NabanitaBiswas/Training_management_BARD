<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseFormRequest;
use App\Course;
use App\Training;
class CourseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function index()
	{
    $courses = Course::all();
    return view('course.index', compact('courses'));
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $trainings=Training::all();
        return view('course.create',compact('trainings'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CourseFormRequest $request)
    {

		$course = new Course(array(
        'course_name' => $request->get('course_name'),
        'introduction' => $request->get('introduction'),
		'objectives' => $request->get('objectives'),
		'course_contents' => $request->get('course_contents'),
		'training_methods' => $request->get('training_methods'),
		'participants' => $request->get('participants'),
		'duration' => $request->get('duration'),
        'academic_staff' => $request->get('academic_staff'),
        'course_fee' => $request->get('course_fee'),
        'accommodation_and_food' => $request->get('accommodation_and_food'),
        'library' => $request->get('library'),
        'award' => $request->get('award'),
        'address_for_correspondence' => $request->get('address_for_correspondence'),
        'training_id' => $request->get('training_id'),
       
    ));
    $course->save();
    $id=$request->get('id');
    return redirect('/courses')->with('Your course has been created!Its id is: '.$id);
   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function training_name_by_training_id($training_id){
        $training = Training::whereid($training_id)->firstOrFail();
        //$training = Training::whereId($training_id)->firstOrFail();

        return $training->training_name;

    }
    public function show($id)
    {
        $courses = Course::whereId($id)->firstOrFail();
        $training_id = $courses->training_id;
        $training_name = $this->training_name_by_training_id($training_id);
        return view('course.show', compact('courses', 'training_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */ 

    public function edit($id)
    {
        $trainings=Training::all();
        $courses = Course::whereId($id)->firstOrFail();
        $training_id = $courses->training_id;
        $training_name = $this->training_name_by_training_id($training_id);
        return view('course.edit', compact('courses','training_name','trainings'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
   public function update($id, CourseFormRequest $request)
    {
        $courses = Course::whereId($id)->firstOrFail();
        $courses->course_name = $request->get('course_name');
        $courses->introduction = $request->get('introduction');
        $courses->objectives = $request->get('objectives');
        $courses->course_contents = $request->get('course_contents');
        $courses->training_methods = $request->get('training_methods');
        $courses->participants = $request->get('participants');
        $courses->duration = $request->get('duration');
        $courses->academic_staff = $request->get('academic_staff');
        $courses->course_fee = $request->get('course_fee');
        $courses->accommodation_and_food = $request->get('accommodation_and_food');
        $courses->library = $request->get('library');
        $courses->award = $request->get('award');
        $courses->address_for_correspondence = $request->get('address_for_correspondence');
        $courses->training_id = $request->get('training_id');


        
        
        
        $courses->save();
        return redirect(action('CourseController@index', $courses->id))->with( 'The course '.$id.' has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $courses = Course::whereId($id)->firstOrFail();
        $courses->delete();
        return redirect('/courses')->with('The ticket '.$id.' has been deleted!');
    }
}
