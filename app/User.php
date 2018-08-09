<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    const NAM = 0;
    const NU = 1;
    const MANAGER = 1;
    const EMPLOYEE = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'address',
        'sex',
        'phone',
        'salary_day',
        'part',
        'day_in',
    ];

    protected $dates = [
        'deleted_at',
        'birthday',
        'day_in',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function works() {
        return $this->hasMany(Working::class);
    }

    public function vacations() {
        return $this->hasMany(Vacation::class);
    }

    public function overTimes() {
        return $this->hasMany(Overtime::class);
    }

    public function salaries() {
        return $this->hasMany(Salary::class);
    }

    public function getWorkingMonths($userId, $month, $status)
    {
        $count = Working::where('user_id', $userId)->where('month', $month)->where('status', $status)->count();

        return $count;
    }

    public function getOvertimeMonths($userId)
    {
        $hour = Overtime::where('user_id', $userId)->whereMonth('date', Carbon::now()->format('m'))->where('status', 1)->sum('hours');

        return $hour;
    }
}
