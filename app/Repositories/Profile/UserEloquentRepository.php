<?php
namespace App\Repositories\Profile;

use App\Repositories\EloquentRepository;
use Auth;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    { 
        return \App\User::class;
    }

    /**
     * Get all vacation only user
     * @return mixed
     */

    public function getUser()
    {
        $result = $this->_model->where('id', Auth::user()->id)->first();

        return $result;
    }
}
