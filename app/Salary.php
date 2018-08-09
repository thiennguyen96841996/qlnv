<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;
use Carbon\Carbon;

class Salary extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'month',
        'year',
        'user_id',
        'day_working',
        'total',
        'overtime_hour',
    ];
    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setDateAttribute($month, $year){
        return "$this->month-$this->year";
    }
}
