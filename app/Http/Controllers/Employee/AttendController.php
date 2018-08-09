<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Working;
use Auth;
use Carbon\Carbon;

class AttendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attends = Working::where('user_id', Auth::user()->id)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->orderBy('date')->get();
        $stastics = working::where('user_id', Auth::user()->id)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->get();
        $lates = working::where('user_id', Auth::user()->id)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->where('status', 0)->get();

        return view('employees.attend.index', compact('attends', 'stastics', 'lates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeNow = Carbon::now();
        $time = $timeNow->toTimeString();
        $attendsions = new working;
        $attendsions->date = $timeNow;
        $attendsions->month = $timeNow->month;
        $attendsions->time = $time;
        if($timeNow->hour <= 7) {
            $attendsions->status = 1;
        } else {
            $attendsions->status = 0;
        }
        $attendsions->user_id = Auth::user()->id;
        $checkExitDate = working::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->value('date');
        $checkExitDate = substr( $checkExitDate , 0, 10);
        if(!($timeNow->format('Y-m-d') === $checkExitDate)) {
            $attendsions->save();

            return redirect()->route('attend.index')->with('success', __('create_success')); 
        } else {
            return redirect()->route('attend.index')->with('error', __('attend_fail'));
        }
    }
}
