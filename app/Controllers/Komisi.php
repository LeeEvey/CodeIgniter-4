<?php

namespace App\Controllers;

use App\Models\ProspekModel;
use App\Models\KomisiModel;

class Komisi extends BaseController
{
    protected $prospekModel;
    protected $komisiModel;
    public function __construct()
    {
        $this->prospekModel = new ProspekModel();
        $this->komisiModel = new KomisiModel();
    }

    public function index()
    {
        $data =
            [
                'title' => 'Data Komisi',
                'komisi' => $this->komisiModel->getKomisi()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('komisi/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function editKomisi($id_prospek)
    {
        $data =
            [
                'title' => 'Form Ubah Data Komisi',
                'validation' => \Config\Services::validation(),
                'prospek' => $this->prospekModel->getProspek($id_prospek),
                'komisi' => $this->komisiModel->getKomisi($id_prospek)
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('komisi/edit-komisi', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function updateKomisi($id_prospek)
    {
        $this->prospekModel->getProspek($this->request->getVar('id_prospek'));
        $this->komisiModel->getKomisi($this->request->getVar('id_prospek'));

        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'nama_customer' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Wajib Diisi'
                    ]
                ]
            ];

            if ($this->validate($rules)) {

                $newUser = [
                    'id_prospek' => $id_prospek,
                    'nama_customer' => $this->request->getVar('nama_customer'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'status_hubungan' => $this->request->getVar('status_hubungan'),
                    'status_prospek' => $this->request->getVar('status_prospek'),
                    'proyek_diminati' => $this->request->getVar('proyek_diminati'),
                    'range_harga' => $this->request->getVar('range_harga'),
                    'jadwal_survei' => $this->request->getVar('jadwal_survei'),
                    'keterangan' => $this->request->getVar('keterangan')
                ];

                $User = [
                    'id_prospek' => $this->request->getVar('id_prospek'),
                    'nama_member' => $this->request->getVar('nama_member'),
                    'komisi' => $this->request->getVar('komisi'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status_pencairan' => $this->request->getVar('status_pencairan'),
                    'status_prospek' => $this->request->getVar('status_prospek'),
                ];

                $this->prospekModel->save($newUser);
                $this->komisiModel->save($User);

                session()->setFlashdata('pesan', 'Data berhasil Diubah');
                return redirect()->to('/komisi/index');
            }
        }
        return redirect()->to('/komisi/editKomisi/' . $this->request->getVar('id_prospek'))->withInput();
    }
}
