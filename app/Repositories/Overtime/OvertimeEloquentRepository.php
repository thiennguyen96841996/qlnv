<?php
namespace App\Repositories\Overtime;

use App\Repositories\EloquentRepository;
use Auth;
use Carbon\Carbon;

class OvertimeEloquentRepository extends EloquentRepository implements OvertimeRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        
        return \App\Overtime::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */
    public function getOvertimeUser()
    {
        $result = $this->_model->where('user_id', Auth::user()->id)->get();

        return $result;
    }

    public function getDayOvertimeUser()
    {
        $result = $this->_model->whereMonth('date', Carbon::now()
            ->format('m'))
            ->whereYear('date', Carbon::now()->format('Y'))
            ->whereDay('date', Carbon::now()->format('d'))
            ->get();

        return $result;
    }

    public function getMonthOvertimeUser()
    {
        $result = $this->_model->whereMonth('date', Carbon::now()
            ->format('m'))
            ->whereYear('date', Carbon::now()->format('Y'))
            ->get()->unique('user_id');
            
        return $result;
    }

    public function getShowDayOvertimeUser($id)
    {
        $result = $this->_model->where('user_id', $id)
            ->whereMonth('date', Carbon::now()
            ->format('m'))
            ->whereYear('date', Carbon::now()->format('Y'))
            ->whereDay('date', Carbon::now()->format('d'))
            ->get();

        return $result;
    }

    public function getShowMonthOvertimeUser($id)
    {
        $result = $this->_model->where('user_id', $id)
            ->whereMonth('date', Carbon::now()
            ->format('m'))
            ->whereYear('date', Carbon::now()->format('Y'))
            ->get();
            
        return $result;
    }
    
    public function getShowMonthOvertimeNotifications($id)
    {
        $result = $this->_model->where('user_id', $id)
            ->whereMonth('date', Carbon::now()
            ->format('m'))
            ->whereYear('date', Carbon::now()->format('Y'))
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();
            
        return $result;
    } 
}
