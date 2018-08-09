<?php

namespace App\Http\Controllers\Employee;

use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Repositories\Profile\UserRepositoryInterface;
use App\Http\Requests\ProfileUpdateFormRequest;
use File;

class ProfileController extends Controller
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
        $employee = $this->userRepository->getUser(); 
          
        return view('employees.profile.index', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = $this->userRepository->find($id);
        
        return view('employees.profile.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProfileUpdateFormRequest $request)
    {
        $employee = $this->userRepository->find($id);
        if($request->hasFile('avatar')){
            $file1= $employee->avatar;
            if ($file1 != config('app.imgdefault')) {
                File::delete(config('app.link_avatar') . $file1);
            }
            $file = $request->avatar;
            $file->move(config('app.link_avatar'), $file->getClientOriginalName());
            $data = [
                'avatar' => $file->getClientOriginalName(),
            ];
            $this->userRepository->update($id, $data);
        }
        $password = $request->get('password');
        if($password != '') {
            $password = Hash::make($password);
        } else {
            $password = $employee->password;
        }
        $data = [
            'name' => $request->name,
            'password' => $password,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
        ];
        $this->userRepository->update($id, $data);

        return redirect()->route('profile.index')->with('success', __('updated'));
    }
}
