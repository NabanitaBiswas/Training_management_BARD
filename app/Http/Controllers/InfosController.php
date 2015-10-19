<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InfoFormRequest;
use Illuminate\Support\Facades\Validators;
use Illuminate\Support\Facades\DB;
use App\Info;
use App\Course;
//use App\Http\Middleware\Auth;
//use App\Http\Middleware\TraineeMiddleware;
use Auth;

class InfosController extends Controller
{
    public function __construct(){
        $this->middleware('trainee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


  public function traineeHome()
  {
    return view('trainee.trainee');
  }

   public function index()
    {
          $infos = Info::all();
         return view('infos.index', compact('infos'))->with('trainings', 'active');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $courses = Course::all();
        $user = Auth::User();
        $user_id = $user->id;

        return view('trainee.create', compact('courses'))->with('user_id', $user_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InfoFormRequest $request)
    {
       //return implode(",",$request->get('diseases'));
        $diseaseString =$request->get('diseases');
        $diseases = serialize($diseaseString);
      
        //return $a;
        //$b = unserialize($a);
       // return $b;
        $expertiseString =$request->get('expertise');
        $expertise = serialize($expertiseString);
        
       
       //$diseaseString = implode(",",$request->get('diseases[]') );
        //$expertString = implode(",",$request->get('expertise[]'));
        $slug = uniqid();

        $info = new Info(array(
        'name' => $request->get('name'),
        'gender' => $request->get('gender'),
        'trainee_id' => $request->get('trainee_id'),
        'trainee_login_id' => $request->get('trainee_login_id'),

        'institution' => $request->get('institution'),
        'educational_qualification' => $request->get('educational_qualification'),
        'service_experience' => $request->get('service_experience'),
        'experience_year' => $request->get('experience_year'),
        'date_of_birth' => $request->get('date_of_birth'),
        'birth_place' => $request->get('birth_place'),
        'join_date' => $request->get('join_date'),
        'guardians_name' => $request->get('guardians_name'),
        'village' => $request->get('village'),
        'post_office' => $request->get('post_office'),
        'sub_district' => $request->get('sub_district'),
        'district' => $request->get('district'),
        'service_station' => $request->get('service_station'),
        'marital' => $request->get('marital'),
        'ph_home' => $request->get('ph_home'),
        'ph_office' => $request->get('ph_office'),
        'ph_mobile' => $request->get('ph_mobile'),
        'diseases' =>  $diseases,
        'soprts' => $request->get('soprts'),
        'hobby' => $request->get('hobby'),
        'expertise' => $expertise,
        'interested_game' => $request->get('interested_game'),
        'height' => $request->get('height'),
        'weight' => $request->get('weight'),
        'waist_abdomen' => $request->get('waist_abdomen'),
        'chest' => $request->get('chest'),
        'weight_end_course' => $request->get('weight_end_course'),
        'slug' => $slug,

         'course_id'=>$request->get('training_name'),
        ));
        $info->save();

        return redirect('/trainee_create')->with('status', 'Congratulation!! Your form submission is successfull!! ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    {

         $info = Info::whereSlug($slug)->firstOrFail();
         return view('infos.show', compact('info'));
    }
    
    //trainee profile
    public function show_profile($id)
    {

         $info = Info::whereId($id)->firstOrFail();
         return view('trainee.show', compact('info'));
    }

     public function edit_profile($id)
    {
        $info = Info::whereId($id)->firstOrFail();
        $user = Auth::User();
        $user_id = $user->id;
        return view('trainee.edit', compact('info'))->with('user_id', $user_id);
    }

    public function update_profile($id, InfoFormRequest $request)
    {
        $info = Info::whereId($id)->firstOrFail();
        $info->name = $request->get('name');
        $info->gender = $request->get('gender');
        $info->trainee_id = $request->get('trainee_id');
        $info->trainee_login_id = $request->get('trainee_login_id');
        $info->institution = $request->get('institution');
        $info->educational_qualification = $request->get('educational_qualification');
        $info->service_experience = $request->get('service_experience');
        $info->experience_year = $request->get('experience_year');
        $info->date_of_birth = $request->get('date_of_birth');
        $info->birth_place = $request->get('birth_place');
        $info->join_date = $request->get('join_date');
        $info->guardians_name = $request->get('guardians_name');
        $info->village = $request->get('village');
        $info->post_office = $request->get('post_office');
        $info->sub_district = $request->get('sub_district');
        $info->district = $request->get('district');
        $info->service_station = $request->get('service_station');
        $info->marital = $request->get('marital');
        $info->ph_home = $request->get('ph_home');
        $info->ph_office = $request->get('ph_office');
        $info->ph_mobile = $request->get('ph_mobile');
       
        $info->soprts = $request->get('soprts');
        $info->hobby = $request->get('hobby');
  
        $info->interested_game = $request->get('interested_game');
        $info->height = $request->get('height');
        $info->weight = $request->get('weight');
        $info->waist_abdomen = $request->get('waist_abdomen');
        $info->chest= $request->get('chest');
        $info->weight_end_course = $request->get('weight_end_course');
       
       if($request->get('status') != null) {
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->save();
        return redirect(action('InfosController@edit', $info->id))->with('status', 'The trainees information has been updated!');
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $info = Info::whereSlug($slug)->firstOrFail();
        return view('infos.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update($slug, InfoFormRequest $request)
    {
        $info = Info::whereSlug($slug)->firstOrFail();
        $info->name = $request->get('name');
        $info->gender = $request->get('gender');
        $info->trainee_id = $request->get('trainee_id');
        $info->institution = $request->get('institution');
        $info->educational_qualification = $request->get('educational_qualification');
        $info->service_experience = $request->get('service_experience');
        $info->experience_year = $request->get('experience_year');
        $info->date_of_birth = $request->get('date_of_birth');
        $info->birth_place = $request->get('birth_place');
        $info->join_date = $request->get('join_date');
        $info->guardians_name = $request->get('guardians_name');
        $info->village = $request->get('village');
        $info->post_office = $request->get('post_office');
        $info->sub_district = $request->get('sub_district');
        $info->district = $request->get('district');
        $info->service_station = $request->get('service_station');
        $info->marital = $request->get('marital');
        $info->ph_home = $request->get('ph_home');
        $info->ph_office = $request->get('ph_office');
        $info->ph_mobile = $request->get('ph_mobile');
       
        $info->soprts = $request->get('soprts');
        $info->hobby = $request->get('hobby');
  
        $info->interested_game = $request->get('interested_game');
        $info->height = $request->get('height');
        $info->weight = $request->get('weight');
        $info->waist_abdomen = $request->get('waist_abdomen');
        $info->chest= $request->get('chest');
        $info->weight_end_course = $request->get('weight_end_course');
       
       if($request->get('status') != null) {
            $info->status = 0;
        } else {
            $info->status = 1;
        }
        $info->save();
        return redirect(action('InfosController@edit', $info->slug))->with('status', 'The trainees information has been updated!');
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
