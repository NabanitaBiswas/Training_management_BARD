<?php

namespace App\Http\Controllers;
use App\Testimonial;
use DateTime;
use Carbon\Carbon;
use App\Course;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TrainingFormRequest;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{

    public function training_info()
    {
        return view('trainings.training_info');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publicIndex()
    {
        $trainings = Training::where('status',1)->get();
        return view('trainings.public_training_pages.index', compact('trainings'));
    }
    public function index()
    {
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
        //if($trainings->start_date<date('Y-m-d'))
        //return $trainings->start_date;
        //$trainings = Training::first();
        //return view('trainings.index', compact('trainings'));
        //$now = new Datetime();
        //$now=$now->format('Y-m-d');
        //return var_dump($now);
        //$trainings=Training::where('start_date','<',$now);
        //$trainings=Training::where('start_date','>',Carbon::parse('2015-10-02'));
        //$trainings=Training::where('start_date','=',\DB::raw('2015-10-02'));
        //$trainings=Training::wherestart_date(2015-10-05);
        //return $trainings;
        //return view('trainings.index', compact('trainings'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingFormRequest $request)
    {
            $training = new Training(array(
            'training_name' => $request->get('training_name'),
            'training_type'=>$request->get('training_type'),
            'description'=>$request->get('description'),
            'applying_information'=>$request->get('applying_information'),
            'objectives'=>$request->get('objectives'),
            //'courses'=>$request->get('courses'),
            'start_date'=>$request->get('start_date'),
            'end_date'=>$request->get('end_date'),
            'provided_resources'=>$request->get('provided_resources'),
            'accommodation'=>$request->get('accommodation'),
            //'testimonial'=>$request->get('testimonial').'<br> Author Name : '.$request->get('name'),
            'daily_schedule'=>$request->get('daily_schedule'),
            'fees_structure'=>$request->get('fees_structure'),
            'responsible_person'=>$request->get('responsible_person'),
        ));

        $training->save();
        return redirect('/training_info')->with('status', 'Your information is inserted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        $courses=Course::wheretraining_id($id)->get();
        $testimonials=Testimonial::wheretraining_id($id)->get();
        return view('trainings.show', compact('training'),compact('courses'))->with('testimonials',$testimonials);
    }
    public function publicShow($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        $courses=Course::wheretraining_id($id)->get();
        $testimonials=Testimonial::wheretraining_id($id)->get();
        return view('trainings.public_training_pages.show', compact('training'),compact('courses'))->with('testimonials',$testimonials);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TrainingFormRequest $request)
    {
        $training =  Training::where('id',$id)->firstOrFail();
        $training->training_name = $request->get('training_name');
        $training->training_type    = $request->get('training_type');
        $training->description    = $request->get('description');
        $training->applying_information=$request->get('applying_information');
        $training->objectives=$request->get('objectives');
        $training->start_date=$request->get('start_date');
        $training->end_date=$request->get('end_date');
        $training->provided_resources=$request->get('provided_resources');
        $training->accommodation=$request->get('accommodation');
        $training->daily_schedule=$request->get('daily_schedule');
        $training->fees_structure=$request->get('fees_structure');
        $training->responsible_person=$request->get('responsible_person');
       // return $training->toArray();
       // $training->save();Route::post('/training/{id?}','TrainingsController@active_status_update');
        Training::where('id',$id)->update($training->toArray());
        return redirect(action('TrainingsController@edit', $training->id))->with('status', 'Information  has been updated!');
    }
    /*public function active_status_update($id){
        $training =  Training::where('id',$id)->firstOrFail();
        $training->status =1;
        $training->save();
        return redirect('trainings.index')->with('status', 'status  has been updated!');
    }
    public function inactive_status_update($id){
        $training =  Training::where('id',$id)->firstOrFail();
        $training->status =0;
        $training->save();
    }*/
    public function statusUpdate($id){
        $training =  Training::where('id',$id)->firstOrFail();
        if($training->status){
            $training->status =0;
        }
        else
        {
            $training->status =1;
        }
        $training->save();
        $trainings = Training::all();
        return view('trainings.index', compact('trainings'));
        //return view('trainings.index')->with('status', 'status  has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::whereid($id)->firstOrFail();
        $training->delete();
        return redirect('/trainings')->with('status', 'The training information has been deleted!');
    }
}
