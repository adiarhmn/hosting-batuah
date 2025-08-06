<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

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

    public function getCode($username)
    {
        return  strtoupper(substr($username, 0, 3)) . rand(1000, 9999) . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 4));
    }
}
