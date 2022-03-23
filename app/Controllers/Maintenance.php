<?php

namespace App\Controllers;

class Maintenance extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'User & Role',
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('maintenance/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function maintenance()
    {
        $data =
            [
                'title' => 'Backup, Restore, Import Data'
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('maintenance/maintenance', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
