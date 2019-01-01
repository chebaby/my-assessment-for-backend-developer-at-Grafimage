<?php

namespace Jde\Http\Controllers;

use Jde\Http\Controllers\Controller;

use Jde\User;
use Excel;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.survey.index');
    }


    public function displayNotification()
    {
        return view('public.survey.notification');
    }


    public function dashboard()
    {
        return view('dashboard.survey.index');
    }


    public function export()
    {
        $data = User::get()->toArray();

        return Excel::create('UsersList', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });

        })->download('csv');
    }

}
