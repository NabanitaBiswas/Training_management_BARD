<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Marksheet;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class MarkSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=Exam::all();
        return view('marksheet/index',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exams=Exam::lists('title','id');
        return view('marksheet/create',compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=Input::all();
        $examId=$request->examId;
        foreach($input as $traineeId=>$mark){
            if($traineeId==0 or $mark==0) {
                continue;
            }else{
                $this->insertMarks($mark, $traineeId, $examId);
            }
        }
        return redirect('/marksheet')->with('status','Mark Insert successfully');


    }
    public function insertMarks($mark,$traineeId,$examId)
    {
        $markIn=new Marksheet();
        $markIn->trainee_id=$traineeId;
        $markIn->mark=$mark;
        $markIn->exam_id=$examId;
        $markIn->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        return view('marksheet/edit',compact('marksheet'));
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
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        //$marksheet->trainee=$request->get('trainee');
        $marksheet->mark=$request->get('mark');
        $marksheet->save();
        return redirect('listOfstudentsAndMarks')->with('status','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marksheet=Marksheet::whereid($id)->firstOrfail();
        $marksheet->delete();
        return redirect('/listOfstudentsAndMarks')->with('status','Deleted successfully');
    }

    public function getTrainee($examId)
    {
        //dd($examId);
        $trainees=User::all();
        return view('marksheet/create',compact('trainees','examId'));
    }

    public function listOfstudentsAndMarks()
    {
        $marksheets=Marksheet::all();
        $exams=Exam::all();
        return view('marksheet/listOfstudentsAndMarks',compact('marksheets','exams'));
    }
}
