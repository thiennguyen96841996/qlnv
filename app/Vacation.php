<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacation extends Model
{
    const waitting = 0;
    const approve = 1;
    const refuse = 2;
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'date_start', 
        'date_end', 
        'content', 
        'status', 
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
