<?php
namespace App\Repositories\Vacation;

interface VacationRepositoryInterface
{
    /**
     * Get all vacation only user
     * @return mixed
     */
    public function getVacationUser();

    public function getShowMonthVacationNotifications($id);
}
