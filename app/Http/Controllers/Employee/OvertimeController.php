<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Overtime\OvertimeRepositoryInterface;
use App\Http\Requests\OvertimeFormRequest;
use App\Http\Requests\OvertimeUpdateRequest;
use Auth;
use Carbon\Carbon;

class OvertimeController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $vacationRepository;

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
        $overtimes = $this->overtimeRepository->getOvertimeUser();

        return view('employees.overtime.index', compact('overtimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.overtime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OvertimeFormRequest $request)
    {
        $date = $request->date;
        $start = $request->time_start;
        $end = $request->time_end;
        if ($date < Carbon::now()->toDateString('Y:m:d') && $start < Carbon::now()->toTimeString('H:m:i')) {
            return redirect()->back()->with('error',  __('create_fail'));
        }
        $toTime = strtotime($end);
        $fromTime = strtotime($start);
        $hour = ceil($toTime - $fromTime) / (60 * 60);
        $data = [
            'date' => $date,
            'time_start' => $start,
            'time_end' => $end,
            'hours' => $hour,
            'status' => config('app.waitting'),
            'user_id' => Auth::user()->id,
        ];
        $this->overtimeRepository->create($data);

        return redirect()->route('overtime.create')->with('success', __('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overtime = $this->overtimeRepository->find($id);

        return view('employees.overtime.edit', compact('overtime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OvertimeUpdateRequest $request, $id)
    {
        $date = $request->date;
        $start = $request->time_start;
        $end = $request->time_end;
        if ($date <= \Carbon\Carbon::now()) {
            return redirect()->back()->with('error',  __('update_fail'));
        }
        $data = [
            'date' => $date,
            'time_start' => $start,
            'time_end' => $end,
        ];
        $this->overtimeRepository->update($id, $data);

        return redirect()->back()->with('success', __('update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->overtimeRepository->delete($id);

        return redirect()->back()->with('success', __('delete_success'));
    }
}
