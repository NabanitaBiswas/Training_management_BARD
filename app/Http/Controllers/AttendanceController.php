<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceFormRequest;
use App\Attendance;
use App\Course;
use App\Info;
use Carbon;
use Illuminate\Support\Facades\Input;
use DB;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  



    
    /*public function view_attendance(AttendanceFormRequest $request)
    {
         
    $trainee_attendances = Attendance::whereCourse_id($course_id)->lists('trainee_attendance');
    $present = Attendance::whereCourse_id($course_id)->where("trainee_attendance","P")->count('trainee_attendance');
    //return $present;
     $absent = Attendance::whereCourse_id($course_id)->where("trainee_attendance","A")->count('trainee_attendance');
    //return $absent;
    $course_id = $request->get('course_id');   
    $course_name = $this->course_name_by_course_id($course_id);
    $session = $request->get('session');
    $date = $request->get('date');
    return view('attendances.attendance_show')
       
        ->with('date', $date)
        ->with('session', $session)
        ->with('course_name', $course_name)
        ->with('course_id', $course_id)
        ->with('present', $present) 
        ->with('absent', $absent);


    }*/

    public function attendance_info(){
         $courses = Course::all();
         return view('attendances.show_attendance_info',compact('courses'));
    }

    public function get_attendance_info(AttendanceFormRequest $request){

    }

    public function preform_fill()
    {
        $courses = Course::all();
        return view('attendances.preform_fill', compact('courses','infos'))->with('trainings', 'active');    
    }

    public function show_attendance_form_function(AttendanceFormRequest $request)
    {

        $course_id = $request->get('course_id');
        $date = $request->get('date');
        $session = $request->get('session');
        $check=Attendance::whereCourse_id($course_id)->whereSession_name($session)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$date.' 00:00:00'))->count('id');
        if($check){
            $courses = Course::all();
            return redirect('/attendance_preform')->with("status","Attendance already entered.")->with('courses',$courses);
        }
        else{
            $trainee_list = Info::whereCourse_id($course_id)->get();
            $course_name = $this->course_name_by_course_id($course_id);
            return view('attendances.attendance_create')
                ->with('trainee_list', $trainee_list)
                ->with('date', $date)
                ->with('session', $session)
                ->with('course_name', $course_name)
                ->with('course_id', $course_id) ;
        }
    }

    public function store_attendance(AttendanceFormRequest $request)
    {
        $course_id = $request->get('course_id');
        $session_name = $request->get('session');
        $day = $request->get('date');
        $trainee_ids=Info::whereCourse_id($course_id)->lists('trainee_id');
        foreach ($trainee_ids as $trainee_id) {
            $attendance = new Attendance();
            $attendance->day =  Carbon\Carbon::createFromFormat('Y-m-d',$day);
            $attendance->trainee_id = $trainee_id;
            $attendance->session_name = $session_name;
            $attendance->course_id = $course_id;
            $attendance->trainee_attendance = $request->get('ta__'.$trainee_id);
            $attendance->save();
        }
        $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","P")->select('trainee_id')->get();
        $present_att=array();
        $i=0;
        foreach($presents as $present){
            $present=Info::whereTrainee_id($present->trainee_id)->select('name')->firstorFail();
            $present_att[$i++]=$present->name;
        }

        $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","A")->select('trainee_id')->get();
        $absent_att=array();
        $j=0;
        foreach($absents as $absent){
            $absent=Info::whereTrainee_id($absent->trainee_id)->select('name')->firstorFail();
            $absent_att[$j++]=$absent->name;
        }
    
        $course_name = $this->course_name_by_course_id($course_id);
        $session = $request->get('session');
        $date = $request->get('date');
        return view('attendances.attendance_show',compact('present_att','absent_att'))->with('date', $date)
            ->with('session', $session)
            ->with('course_name', $course_name)
            ->with('course_id', $course_id);
         
    $course_id = $request->get('course_id');     

    $trainee_ids=Info::whereCourse_id($course_id)->lists('trainee_id');     
    $day = $request->get('date');

     $trainee_ids=Info::whereCourse_id($course_id)->lists('trainee_id');     
     $day = $request->get('date');

    $session_name = $request->get('session');     
     foreach ($trainee_ids as $trainee_id) {           
        $attendance = new Attendance();
         $attendance->day = $day;
         $attendance->trainee_id = $trainee_id;
         $attendance->session_name = $session_name;
         $attendance->course_id = $course_id;

         $attendance->trainee_attendance = $request->get('ta__'.$trainee_id); 
        $attendance->save();
      
        

         $attendance->trainee_attendance = $request->get('ta__'.$trainee_id);         
        $attendance->save();
     
//new code
      $trainee_attendances = Attendance::whereCourse_id($course_id)->lists('trainee_attendance');
    return $trainee_attendances;
    $collection = collect($trainee_attendances);
   // return $collection->count(); 
    


     }

    //new code
  $trainee_attendances = Attendance::whereCourse_id($course_id)->lists('trainee_attendance');
    $present = Attendance::whereCourse_id($course_id)
                
               
                ->where("trainee_attendance","P")->count('trainee_attendance');
    //return $present;
     $absent = Attendance::whereCourse_id($course_id)->where("trainee_attendance","A")->count('trainee_attendance');
    //return $absent;
    
    $course_name = $this->course_name_by_course_id($course_id);
    $session = $request->get('session');
    $date = $request->get('date');
    return view('attendances.attendance_show')
       
        ->with('date', $date)
        ->with('session', $session)
        ->with('course_name', $course_name)
        ->with('course_id', $course_id)
        ->with('present', $present) 
        ->with('absent', $absent);

    }
    public function course_name_by_course_id($id){
        return Course::findOrFail($id)->course_name;
    }

    public function editAttendance(Request $request){
        $course_id = $request->get('course_id');
        $session = $request->get('session');
        $day = $request->get('date');
        $trainee_list = Info::whereCourse_id($course_id)->get();
        $course_name = $this->course_name_by_course_id($course_id);
        $current_attendance = Attendance::whereCourse_id($course_id)->whereSession_name($session)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->get();
        return view('attendances.editAttendance',compact('current_attendance'))
            ->with('trainee_list', $trainee_list)
            ->with('date', $day)
            ->with('session', $session)
            ->with('course_name', $course_name)
            ->with('course_id', $course_id) ;
    }
    public function updateAttendance(Request $request){

        $course_id = $request->get('course_id');
        $session_name = $request->get('session');
        $day = $request->get('date');
        $trainee_ids=Info::whereCourse_id($course_id)->lists('trainee_id');
        foreach ($trainee_ids as $trainee_id) {
            $attendance = Attendance::wheretrainee_id($trainee_id)->whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->firstorFail();
            $attendance->trainee_attendance = $request->get('ta__'.$trainee_id);
            $attendance->update();
        }


        $presents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","P")->select('trainee_id')->get();

        $present_att=array();
        $i=0;
        foreach($presents as $present){
            $present=Info::whereTrainee_id($present->trainee_id)->select('name')->firstorFail();
            $present_att[$i++]=$present->name;
        }

        $absents = Attendance::whereCourse_id($course_id)->whereSession_name($session_name)->where('day','=',Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$day.' 00:00:00'))->where("trainee_attendance","A")->select('trainee_id')->get();
        $absent_att=array();
        $j=0;
        foreach($absents as $absent){
            $absent=Info::whereTrainee_id($absent->trainee_id)->select('name')->firstorFail();
            $absent_att[$j++]=$absent->name;
        }

        $course_name = $this->course_name_by_course_id($course_id);
        $session = $request->get('session');
        $date = $request->get('date');
        return view('attendances.attendance_show',compact('present_att','absent_att'))->with('date', $date)
            ->with('session', $session)
            ->with('course_name', $course_name)
            ->with('course_id', $course_id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show_attendance(){

        return 'show_attendance';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
