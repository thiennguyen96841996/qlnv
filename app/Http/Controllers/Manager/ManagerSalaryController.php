<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Requests\SalaryFormRequest;
use App\Repositories\Salary\SalaryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Overtime;
use App\Working;
use App\Vacation;
use App\Salary;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ManagerSalaryController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $salaryRepository;

    public function __construct(SalaryRepositoryInterface $salaryRepository)
    {
        $this->salaryRepository = $salaryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaries = $this->salaryRepository->getAll();
        
        return view('backend.users.salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $info = User::findOrFail($id);
        $date = Carbon::now();
        $vacations = Vacation::where('user_id', $id)->whereYear('date_start', Carbon::now()->format('Y'))->whereMonth('date_start', Carbon::now()->format('m'))->where('status', 1)->get();
        
        return view('backend.users.salaries.create', compact('info', 'date', 'vacations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaryFormRequest $request)
    {
        $check = Salary::where('user_id', $request->id_user)->where('year', Carbon::now()->year)->where('month', Carbon::now()->month)->get();
        if ($check->count() != 0) {
            return redirect()->route('salary.index')->with('error', __('salary_error'));
        }
        $timeNow = Carbon::now();
        $late = $request->late;
        $overtime = $request->overtime;
        $overtimeprice = $request->overtime_price;
        $lateprice = $request->late_price;
        $working = $request->working;
        $day_salary = $request->day_salary;
        $id = $request->id_user;
        $total = $working * $day_salary + $overtime * $overtimeprice - $late * $lateprice;
        $data = [
            'month' => $timeNow->month,
            'year' => $timeNow->year,
            'user_id' => $id,
            'day_working' => $working,
            'total' => $total,
            'overtime_hour' => $overtime,
        ];
        $this->salaryRepository->create($data);

        return redirect()->route('users.index')->with('success', __('create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::where('user_id', $id)->whereMonth('month', Carbon::now()->format('m'))->whereYear('month', Carbon::now()->format('Y'))->first();

        return view('backend.users.salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary = $this->salaryRepository->find($id);

        return view('backend.users.salaries.edit', compact('salary'));
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
        $data = [
            'overtime_hour' => $request->overtime,
            'day_working' => $request->working,
            'total' => $request->total,
        ];
        $mail = [
            'name' => $request->name,
            'overtime' => $request->overtime,
            'working' => $request->working,
            'total' => $request->total,
        ];
        $this->salaryRepository->update($id,$data);
        Mail::send('backend.users.salaries.mail', ['data' => $mail] , function($message) {
        $message->from('thiennguyen96841996@gmail.com', 'Manager');
        $message->to('nguyen.huu.thien@framgia.com', 'tien tien');
        $message->subject('Lương về lương về');
        });

        return redirect()->route('salary.index')->with('success', __('send_success'));
    }
}
