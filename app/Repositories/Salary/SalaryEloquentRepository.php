<?php
namespace App\Repositories\Salary;

use App\Repositories\EloquentRepository;

class SalaryEloquentRepository extends EloquentRepository implements SalaryRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        
        return \App\Salary::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */
    
}
