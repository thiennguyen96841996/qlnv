<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Overtime;
use App\Working;
use App\User;
use DB;
use Validator;
use Carbon\Carbon;
use App\Repositories\Overtime\OvertimeRepositoryInterface;

class OvertimeController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $overtimeRepository;

    public function __construct(OvertimeRepositoryInterface $overtimeRepository)
    {
        $this->overtimeRepository = $overtimeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $date = Carbon::now();
        $overtimes = $this->overtimeRepository->getDayOvertimeUser();
        $overtimeMonth = $this->overtimeRepository->getMonthOvertimeUser();

        return view('backend.users.overtimes.index', compact('overtimes', 'date', 'overtimeMonth'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notis = Overtime::where('status', 0)->get();

        return view('backend.users.overtimes.handling', compact('notis'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Carbon::now();
        $overtimes = $this->overtimeRepository->getShowDayOvertimeUser($id);
        $overtimeMonth = $this->overtimeRepository->getShowMonthOvertimeUser($id);

        return view('backend.users.overtimes.show', compact('overtimes', 'date', 'overtimeMonth'));
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
        $noti = Overtime::findOrFail($id);
        if ($request->approve) {
            $noti->status = 1;
        } else {
            $noti->status = 2;
        }
        $noti->save();

        return redirect()->back()->with('success', __('done'));
    }
}
