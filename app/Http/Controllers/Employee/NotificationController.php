<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Overtime;
use App\Vacation;
use Carbon\Carbon;
use App\Repositories\Overtime\OvertimeRepositoryInterface;
use App\Repositories\Vacation\VacationRepositoryInterface;

class NotificationController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $overtimeRepository;
    protected $vacationRepository;

    public function __construct(OvertimeRepositoryInterface $overtimeRepository, VacationRepositoryInterface $vacationRepository)
    {
        $this->overtimeRepository = $overtimeRepository;
        $this->vacationRepository = $vacationRepository;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $overtimeMonth = $this->overtimeRepository->getShowMonthOvertimeNotifications($id);
        $vacationMonth = $this->vacationRepository->getShowMonthVacationNotifications($id);

        return view('employees.notifications.show', compact('overtimes', 'date', 'overtimeMonth', 'vacationMonth'));
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
