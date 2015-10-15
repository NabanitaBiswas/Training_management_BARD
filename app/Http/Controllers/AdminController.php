<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\HealthFormRequest;
use App\HealthReport;
use App\HealthExam;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminHealth()
    {
        return view('master');
    }


    public function index()
    {
        $healthInfos = HealthReport::all();
        return view('admin.AdminHealth.adminHealthInfos', compact('healthInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.AdminHealth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthFormRequest $request)
    {
        $healthInfo = new HealthReport(array(
            'user_id' => $request->get('user_id'),
            'present_address' => $request->get('present_address'),
            'permanent_address' => $request->get('permanent_address'),
            'birth_date'=> $request->get('birth_date'),
            'age_beginning_course' => $request->get('age_beginning_course'),
            'marital_status' => $request->get('marital_status'),
            'present_disease' => $request->get('present_disease'),
            'physical_disability' => $request->get('physical_disability')
        ));

        $healthExam = new HealthExam(array(
            'user_id' => $request->get('user_id'),
            'navel' => $request->get('navel'),
            'blood_pressure' => $request->get('blood_pressure'),
            'respiration'=> $request->get('respiration'),
            'anemia' => $request->get('anemia'),
            'jaundice' => $request->get('jaundice'),
            'weight' => $request->get('weight'),
            'heart' => $request->get('heart'),
            'lung' => $request->get('lung'),
            'liver' => $request->get('liver'),
            'spleen' => $request->get('spleen'),
            'kidney' => $request->get('kidney'),
            'hernia' => $request->get('hernia'),
            'hydrocil' => $request->get('hydrocil'),
            'left_eye' => $request->get('left_eye'),
            'right_eye' => $request->get('right_eye'),
            'comments_mofficer' => $request->get('comments_mofficer'),

        ));
        $healthExam->save();
        $healthInfo->save();
        return redirect('/create')->with('status', 'Your information has been created!');
        //print_r($healthInfo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('admin.AdminHealth.adminHealthInfoShow', compact('healthInfo','healthExam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        return view('admin.AdminHealth.adminHealthInfoEdit', compact('healthInfo', 'healthExam'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, HealthFormRequest $request)
    {
        $healthInfo = HealthReport::whereUserId($id)->firstOrFail();
        $healthInfo->present_address = $request->get('present_address');
        $healthInfo->permanent_address = $request->get('permanent_address');
        $healthInfo->birth_date = $request->get('birth_date');
        $healthInfo->age_beginning_course = $request->get('age_beginning_course');
        $healthInfo->marital_status = $request->get('marital_status');
        $healthInfo->present_disease = $request->get('present_disease');
        $healthInfo->physical_disability = $request->get('physical_disability');

        $healthInfo->save();

        $healthExam = HealthExam::whereUserId($id)->firstOrFail();
        $healthExam->navel = $request->get('navel');
        $healthExam->anemia = $request->get('anemia');
        $healthExam->blood_pressure = $request->get('blood_pressure');
        $healthExam->jaundice = $request->get('jaundice');
        $healthExam->respiration = $request->get('respiration');
        $healthExam->weight = $request->get('weight');
        $healthExam->heart = $request->get('heart');
        $healthExam->kidney = $request->get('kidney');
        $healthExam->lung = $request->get('lung');
        $healthExam->hernia = $request->get('hernia');
        $healthExam->hydrocil = $request->get('hydrocil');
        $healthExam->spleen = $request->get('spleen');
        $healthExam->left_eye = $request->get('left_eye');
        $healthExam->right_eye = $request->get('right_eye');
        $healthExam->comments_mofficer = $request->get('comments_mofficer');

        $healthExam->save();
        return redirect(action('AdminController@edit', $healthInfo->user_id))->with('status', 'The User_id '.$healthInfo->user_id.' has been updated!');
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
