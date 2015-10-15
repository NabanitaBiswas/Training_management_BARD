<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackFormRequest;
use App\Trainer;
use App\Feedback;
class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbackInfos = Feedback::all();
        return view('trainee.feedbacks.index', compact('feedbackInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('trainee.feedbacks.create',compact('trainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackFormRequest $request)
    {
       $feedback = new Feedback(array(
           'trainer_id' => $request->get('trainer_id'),
           'voice_range' => $request->get('A1'),
           'voice_clearity' => $request->get('A2'),
           'communication_skills' => $request->get('A3'),
           'rapport_building' => $request->get('A4'),
           'interaction' => $request->get('A5'),
           'topic_usefulness' => $request->get('B1'),
           'material_organization' => $request->get('B2'),
           'speakers_knowledge' => $request->get('B3'),
           'comments' => $request->get('comments'),
        ));
        
        $feedback->save();
        
        return redirect('/trainee/feedbacks/feedbackIndex')->with('status', 'Your information has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedbackInfo = Feedback::whereTrainerId($id)->firstOrFail();
        return view('trainee.feedbacks.show', compact('feedbackInfo'));
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
