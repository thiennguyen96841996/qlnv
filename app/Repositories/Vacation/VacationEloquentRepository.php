<?php
namespace App\Repositories\Vacation;

use App\Repositories\EloquentRepository;
use Auth;
use Carbon\Carbon;

class VacationEloquentRepository extends EloquentRepository implements VacationRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        
        return \App\Vacation::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */
    public function getVacationUser()
    {
        $result = $this->_model->where('user_id', Auth::user()->id)->get();

        return $result;
    }

    public function getShowMonthVacationNotifications($id)
    {
        $result = $this->_model->where('user_id', $id)
            ->whereMonth('date_start', Carbon::now()
            ->format('m'))
            ->whereYear('date_start', Carbon::now()->format('Y'))
            ->orderBy('created_at', 'desc')
            ->limit(1)
            ->get();
            
        return $result;
    } 
}
