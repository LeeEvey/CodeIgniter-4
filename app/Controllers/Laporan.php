<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data =
            [
                'title' => 'Laporan Prospek',
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('laporan/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function pengguna()
    {
        $data =
            [
                'title' => 'Laporan Pengguna'
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('laporan/laporan-pengguna', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function komisi()
    {
        $data =
            [
                'title' => 'Laporan Komisi'
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('laporan/laporan-komisi', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
