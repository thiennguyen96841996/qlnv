<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacation;
use App\Working;
use App\User;
use Carbon\Carbon;

class ManagerVacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now();

        $works = Working::whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->whereDay('date', Carbon::now()->format('d'))->get();

        $lates = Working::where('status', 0)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->whereDay('date', Carbon::now()->format('d'))->get();

        $statics = Working::where('status', 1)->whereMonth('date', Carbon::now()->format('m'))->whereYear('date', Carbon::now()->format('Y'))->get()->unique('user_id');

        $vacations = Vacation::where('status', 1)->where('date_start', 'like', '%' . Carbon::now()->toDatestring('Y:m:d') . '%')->where('date_end', 'like', '%' . Carbon::now()->toDatestring('Y:m:d') . '%')->get()->unique('user_id');

        return view('backend.users.vacations.index', compact('date', 'works', 'lates', 'statics', 'vacations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notis = Vacation::where('status', 0)->get();

        return view('backend.users.vacations.handling', compact('notis'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noti = User::findOrFail($id);
        $reasons = Vacation::where('user_id', $noti->id)->where('status', 1)->orderBy('date_start')->get();

        return view('backend.users.vacations.show', compact('reasons'));
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
        $noti = Vacation::findOrFail($id);
        if ($request->approve) {
            $noti->status = 1;
        } else {
            $noti->status = 2;
        }
        $noti->save();

        return redirect()->back()->with('success', __('done'));
    }
}
