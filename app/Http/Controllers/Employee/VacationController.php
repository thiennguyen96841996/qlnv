<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VacationFormRequest;
use App\Http\Requests\VacationUpdateRequest;
use App\Repositories\Vacation\VacationRepositoryInterface;
use Auth;

class VacationController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $vacationRepository;

    public function __construct(VacationRepositoryInterface $vacationRepository)
    {
        $this->vacationRepository = $vacationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacations = $this->vacationRepository->getVacationUser();

        return view('employees.vacation.index', compact('vacations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.vacation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VacationFormRequest $request)
    {
        $start = $request->date_start;
        $end = $request->date_end;
        if ($start <= \Carbon\Carbon::now()) {
            return redirect()->back()->with('error', __('create_fail'));
        }
        $data = [
            'content' => $request->content,
            'date_start' => $start,
            'date_end' => $end,
            'status' => config('app.waitting'),
            'user_id' => Auth::user()->id
        ];
        $this->vacationRepository->create($data);

        return redirect()->route('vacation.create')->with('success', __('create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacation = $this->vacationRepository->find($id);

        return view('employees.vacation.edit', compact('vacation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VacationUpdateRequest $request, $id)
    {
        $start = $request->date_start;
        $end = $request->date_end;
        if ($start <= \Carbon\Carbon::now()) {
            return redirect()->back()->with('error', __('update_fail'));
        }
        $data = [
            'date_start' => $start,
            'date_end' => $end,
            'content' => $request->content,
        ];
        $this->vacationRepository->update($id, $data);

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
        $this->vacationRepository->delete($id);

        return redirect()->back()->with('success', __('delete_success'));
    }
}
