<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use DateTime;

class Overtime extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'date',
        'time_start', 
        'time_end', 
        'status', 
        'user_id',
        'hours',
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function getOvertimeMonths($userId)
    {
        $hour = Overtime::where('user_id', $userId)->whereMonth('date', Carbon::now()->format('m'))->where('status', 1)->sum('hours');

        return $hour;
    }

    public function getOvertimeDays($userId)
    {
        $hour = Overtime::where('user_id', $userId)->whereDay('date', Carbon::now()->format('d'))->where('status', 1)->sum('hours');

        return $hour;
    }
}
