<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected $list_periods = [7, 30, 90, 180, 356];

    /**
     * Get the list periods.
     *
     * @return array<int>
     */
    public function getListPeriods(): array
    {
        return $this->list_periods;
    }
}
