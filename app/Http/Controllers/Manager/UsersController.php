<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersEditFormRequest;
use App\Http\Requests\UsersAddFormRequest;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Auth;
use Carbon\Carbon;

class UsersController extends Controller
{
     /**
     * @var PostRepositoryInterface|\App\Repositories\RepositoryInterface
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getUser();

        return view('backend.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersAddFormRequest $request)
    {
        $password = bcrypt(config('app.password'));
        $avatar = config('app.imgdefault');
        $part = $request->part;
        if ($part == config('app.chef')) {
            $salary_day = config('app.chef_salary');
        } else if ($part == config('app.shipper')) {
            $salary_day = config('app.shipper_salary');
        } else {
            $salary_day = config('app.other_salary');
        }
        $day_in = Carbon::now()->toDateString('Y:m:d');
        $data = [
            'day_in' => $day_in,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'avatar' => $avatar,
            'role' => config('app.employee'),
            'salary_day' => $salary_day,
            'part' => $request->part,
        ];
        $this->userRepository->create($data);
       
        return redirect()->route('users.index')->with('success', __('created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('backend.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UsersEditFormRequest $request)
    {
        $user = $this->userRepository->find($id);
        $password = $request->get('password');
        if($password != '') {
            $password = Hash::make($password);
        } else {
            $password = $user->password;
        }
        $part = $request->part;
        if ($part == config('app.chef')) {
            $salary_day = config('app.chef_salary');
        } else if ($part == config('app.shipper')) {
            $salary_day = config('app.shipper_salary');
        } else {
            $salary_day = config('app.other_salary');
        }
        $data = [
            'password' => $password,
            'salary_day' => $salary_day,
            'part' => $request->get('part'),
        ];
        $this->userRepository->update($id, $data);

        return redirect()->route('users.index')->with('success', __('updated'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->userRepository->find($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', __('deleted'));
    }
}
