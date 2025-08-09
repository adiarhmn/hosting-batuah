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



    /*
        NOTE:
        Function listUsers() retrieves a list of users from the hosting service.
    */
    protected function API_listUsers()
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USERS');
        if ($response->successful()) {
            $users = [];
            parse_str($response->body(), $users);
            // Extract usernames from the list array
            return isset($users['list']) ? $users['list'] : [];
        }
        return null;
    }

    protected function API_getUserDetail($username)
    {
        $response = Http::withBasicAuth(
            config('app.hosting.username'),
            config('app.hosting.password')
        )->get(config('app.hosting.url') . '/CMD_API_SHOW_USER_CONFIG', [
            'user' => $username
        ]);
        return $response->successful() ?
            tap([], fn(&$userDetail) => parse_str($response->body(), $userDetail)) :
            null;
    }
}
