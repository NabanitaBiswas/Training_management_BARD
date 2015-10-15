<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Announcement;
use App\Training;

class BardFrontendController extends Controller
{
    public function index()
    {   $limit=3;
        $announcement = Announcement::orderBy('created_at','desc')->limit($limit)->get();
        $trainings = Training::orderBy('start_date','asc')->get();
        return view('bard_frontend.index', compact('announcement'),compact('trainings'));

        //return view('bard_frontend/index')->with('index', 'active');


    }
    public function trainings()
    {
        return view('bard_frontend/trainings')->with('trainings', 'active');
    }
    public function faculty()
    {
        return view('bard_frontend/faculty')->with('faculty', 'active');
    }
    public function clients()
    {
        return view('bard_frontend/clients')->with('clients', 'active');
    }
    public function about()
    {
        return view('bard_frontend/about')->with('about', 'active');
    }
    public function contact()
    {
        return view('bard_frontend/contact')->with('contact', 'active');
    }

    public function trainers()
    {
        return view('bard_frontend/trainers')->with('trainings', 'active');
    }
    public function trainees()
    {
        return view('bard_frontend/trainees')->with('trainings', 'active');
    }
}
