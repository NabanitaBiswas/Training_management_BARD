<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerFormRequest;
use App\Trainer;
class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('trainers.index', compact('trainers'))->with('trainings', 'active');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('trainers.create')->with('trainings', 'active');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainerFormRequest $request)
    {
        $slug = uniqid();
        $trainer = new Trainer(array(
        'name' => $request->get('name'),
        'gender' => $request->get('gender'),
        
        'educational_qualification' => $request->get('educational_qualification'),
        'previous_experience' => $request->get('previous_experience'),
        'email' => $request->get('email'),
        'date_of_birth' => $request->get('date_of_birth'),
        'country' => $request->get('country'),
        'skill_set' => $request->get('skill_set'),
        'cell_number' => $request->get('cell_number'),
        'slug' => $slug
    ));


    $trainer->save();

    return redirect('/trainer_create')->with('status', 'Your data has been saved! Its unique id is: '.$slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         $trainer = Trainer::whereSlug($slug)->firstOrFail();
         return view('trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($slug)
{
    $trainer = Trainer::whereSlug($slug)->firstOrFail();
    return view('trainers.edit', compact('trainer'))->with('trainings', 'active');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($slug, TrainerFormRequest $request)
{
    $trainer = Trainer::whereSlug($slug)->firstOrFail();
    $trainer->name = $request->get('name');
    $trainer->email = $request->get('email');
    $trainer->country = $request->get('country');
    $trainer->skill_set = $request->get('skill_set');
    $trainer->gender = $request->get('gender');
    $trainer->educational_qualification = $request->get('educational_qualification');
    $trainer->previous_experience = $request->get('previous_experience');
    $trainer->date_of_birth = $request->get('date_of_birth');
    $trainer->cell_number = $request->get('cell_number');
    if($request->get('status') != null) {
        $trainer->status = 0;
    } else {
        $trainer->status = 1;
    }
    $trainer->save();
    return redirect(action('TrainersController@edit', $trainer->slug))->with('status', 'The trainer status has been updated!');

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

    public function courses()
    {
        return $this->hasMany('Course');
    }
}
