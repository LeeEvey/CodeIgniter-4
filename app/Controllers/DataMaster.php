<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;
use App\Models\DetailModel;
use App\Models\FasilitasModel;
use App\Models\ProyekModel;
use App\Models\MarketingModel;
use App\Models\ProspekModel;
use App\Models\KomisiModel;
// use App\Models\UploadModel;


class DataMaster extends BaseController
{
    protected $memberModel;
    protected $userModel;
    protected $detailModel;
    protected $fasilitasModel;
    protected $proyekModel;
    protected $marketingModel;
    protected $prospekModel;
    protected $komisiModel;
    // protected $uploadModel;
    public function __construct()
    {
        $this->memberModel = new MemberModel();
        $this->userModel = new UserModel();
        $this->detailModel = new DetailModel();
        $this->fasilitasModel = new FasilitasModel();
        $this->proyekModel = new ProyekModel();
        $this->marketingModel = new MarketingModel();
        $this->prospekModel = new ProspekModel();
        $this->komisiModel = new KomisiModel();
        // $this->uploadModel = new UploadModel();
    }

    public function index()
    {
        $data =
            [
                'title' => 'Data Member',
                'member' => $this->memberModel->getMember(),
                'user' => $this->userModel->getUser()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/index', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function create()
    {
        $data =
            [
                'title' => 'Form Tambah Data Member',
                'validation' => \Config\Services::validation()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/tambah-member', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function save()
    {
        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'nama_member' =>
                [
                    'rules' => 'required|is_unique[member_profile.nama_member]',
                    'errors' =>
                    [
                        'required' => 'Nama Member harus diisi',
                        'is_unique' => 'Nama Member sudah ada di database'
                    ]
                ],
                'alamat' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Alamat harus diisi'
                    ]
                ],
                'handphone' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'No Handphone harus diisi'
                    ]
                ],
                'nama_rekening' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama Rekening harus diisi'
                    ]
                ],
                'nama_bank' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama Bank harus diisi'
                    ]
                ],
                'no_rekening' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'No Rekening harus diisi'
                    ]
                ],
                'foto_ktp' =>
                [
                    'rules' => 'max_size[foto_ktp,1024]|is_image[foto_ktp]|mime_in[foto_ktp, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'fotodiri_ktp' =>
                [
                    'rules' => 'max_size[fotodiri_ktp,1024]|is_image[fotodiri_ktp]|mime_in[fotodiri_ktp, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto_profile' =>
                [
                    'rules' => 'max_size[foto_profile,1024]|is_image[foto_profile]|mime_in[foto_profile, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto_rekening' =>
                [
                    'rules' => 'max_size[foto_rekening,1024]|is_image[foto_rekening]|mime_in[foto_rekening, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[user.email]',
                    'errors' =>
                    [
                        'required' => 'Email harus diisi',
                        'is_unique' => 'Email sudah ada di database'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[6]',
                    'errors' =>
                    [
                        'required' => 'Password harus diisi'
                    ]
                ],
                'cpassword' => [
                    'rules' => 'required|matches[password]',
                    'errors' =>
                    [
                        'required' => 'Konfirmasi Password harus diisi'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                //ambil gambar
                $foto_ktp = $this->request->getFile('foto_ktp');
                //apakah tidak ada gambar yang diupload
                if ($foto_ktp->getError() == 4) {
                    $Foto_Ktp = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto_Ktp = $foto_ktp->getRandomName();
                    //pindahkan file ke folder img
                    $foto_ktp->move('profile', $Foto_Ktp);
                }
                //ambil gambar
                $fotodiri_ktp = $this->request->getFile('fotodiri_ktp');
                //apakah tidak ada gambar yang diupload
                if ($fotodiri_ktp->getError() == 4) {
                    $FotoDiri_Ktp = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $FotoDiri_Ktp = $fotodiri_ktp->getRandomName();
                    //pindahkan file ke folder img
                    $fotodiri_ktp->move('profile', $FotoDiri_Ktp);
                }
                //ambil gambar
                $foto_profile = $this->request->getFile('foto_profile');
                //apakah tidak ada gambar yang diupload
                if ($foto_profile->getError() == 4) {
                    $Foto_Profile = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto_Profile = $foto_profile->getRandomName();
                    //pindahkan file ke folder img
                    $foto_profile->move('profile', $Foto_Profile);
                }
                //ambil gambar
                $foto_rekening = $this->request->getFile('foto_rekening');
                //apakah tidak ada gambar yang diupload
                if ($foto_rekening->getError() == 4) {
                    $Foto_Rekening = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto_Rekening = $foto_rekening->getRandomName();
                    //pindahkan file ke folder img
                    $foto_rekening->move('profile', $Foto_Rekening);
                }
                $status = $this->request->getVar('status_member');
                if ($status === null) {
                    $status_default = 'aktif';
                }
                $newUser = [
                    'nama_member' => $this->request->getVar('nama_member'),
                    'alamat' => $this->request->getVar('alamat'),
                    'handphone' => $this->request->getVar('handphone'),
                    'whatsapp' => $this->request->getVar('whatsapp'),
                    'usia' => $this->request->getVar('usia'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'rekomendasi' => $this->request->getVar('rekomendasi'),
                    'nama_rekening' => $this->request->getVar('nama_rekening'),
                    'nama_bank' => $this->request->getVar('nama_bank'),
                    'no_rekening' => $this->request->getVar('no_rekening'),
                    'status_member' => $status_default,
                    'foto_ktp' => $Foto_Ktp,
                    'fotodiri_ktp' => $FotoDiri_Ktp,
                    'foto_profile' => $Foto_Profile,
                    'foto_rekening' => $Foto_Rekening
                ];

                $role = $this->request->getVar('role');
                if ($role === null) {
                    $role_default = 'member';
                }
                $user = [
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role' => $role_default
                ];

                $this->memberModel->save($newUser);
                $this->userModel->save($user);

                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                return redirect()->to('/dataMaster');
            }
        }
        return redirect()->to('/dataMaster/create')->withInput();
    }

    public function delete($id_member)
    {
        $member = $this->memberModel->find($id_member);
        $this->userModel->find($id_member);
        //cek jika file gambarnya default.jpg
        if ($member['foto_ktp'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $member['foto_ktp']);
        }
        //cek jika file gambarnya default.jpg
        if ($member['fotodiri_ktp'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $member['fotodiri_ktp']);
        }
        //cek jika file gambarnya default.jpg
        if ($member['foto_profile'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $member['foto_profile']);
        }
        //cek jika file gambarnya default.jpg
        if ($member['foto_rekening'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $member['foto_rekening']);
        }
        //hapus data
        $this->memberModel->delete($id_member);
        $this->userModel->delete($id_member);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect('master/index');
    }

    public function edit($id_member)
    {
        $data =
            [
                'title' => 'Form Ubah Data Member',
                'validation' => \Config\Services::validation(),
                'member' => $this->memberModel->getMember($id_member),
                'user' => $this->userModel->getUser($id_member)
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/edit-member', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function update($id_member)
    {
        $member = $this->memberModel->getMember($this->request->getVar('id_member'));
        $this->userModel->getUser($this->request->getVar('id_member'));

        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'nama_member' =>
                [
                    'rules' => 'required',
                    'errors' =>
                    [
                        'required' => 'Nama Member harus diisi'
                    ]
                ],
                'foto_ktp' =>
                [
                    'rules' => 'max_size[foto_ktp,1024]|is_image[foto_ktp]|mime_in[foto_ktp, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'fotodiri_ktp' =>
                [
                    'rules' => 'max_size[fotodiri_ktp,1024]|is_image[fotodiri_ktp]|mime_in[fotodiri_ktp, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto_profile' =>
                [
                    'rules' => 'max_size[foto_profile,1024]|is_image[foto_profile]|mime_in[foto_profile, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto_rekening' =>
                [
                    'rules' => 'max_size[foto_rekening,1024]|is_image[foto_rekening]|mime_in[foto_rekening, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $foto_ktp = $this->request->getFile('foto_ktp');
                //cek gambar, apakah tetap gambar lama
                if ($foto_ktp->getError() == 4) {
                    $Foto_Ktp = $this->request->getVar('foto_ktpLama');
                } else {
                    //generate nama file random
                    $Foto_Ktp = $foto_ktp->getRandomName();
                    //pindahkan gambar
                    $foto_ktp->move('profile', $Foto_Ktp);
                    //cek jika file gambarnya default.jpg
                    if ($member['foto_ktp'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto_ktpLama'));
                    }
                }
                $fotodiri_ktp = $this->request->getFile('fotodiri_ktp');
                //cek gambar, apakah tetap gambar lama
                if ($fotodiri_ktp->getError() == 4) {
                    $FotoDiri_Ktp = $this->request->getVar('fotodiri_ktpLama');
                } else {
                    //generate nama file random
                    $FotoDiri_Ktp = $fotodiri_ktp->getRandomName();
                    //pindahkan gambar
                    $fotodiri_ktp->move('profile', $FotoDiri_Ktp);
                    //cek jika file gambarnya default.jpg
                    if ($member['fotodiri_ktp'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('fotodiri_ktpLama'));
                    }
                }
                $foto_profile = $this->request->getFile('foto_profile');
                //cek gambar, apakah tetap gambar lama
                if ($foto_profile->getError() == 4) {
                    $Foto_Profile = $this->request->getVar('foto_profileLama');
                } else {
                    //generate nama file random
                    $Foto_Profile = $foto_profile->getRandomName();
                    //pindahkan gambar
                    $foto_profile->move('profile', $Foto_Profile);
                    //cek jika file gambarnya default.jpg
                    if ($member['foto_profile'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto_profileLama'));
                    }
                }
                $foto_rekening = $this->request->getFile('foto_rekening');
                //cek gambar, apakah tetap gambar lama
                if ($foto_rekening->getError() == 4) {
                    $Foto_Rekening = $this->request->getVar('foto_rekeningLama');
                } else {
                    //generate nama file random
                    $Foto_Rekening = $foto_rekening->getRandomName();
                    //pindahkan gambar
                    $foto_rekening->move('profile', $Foto_Rekening);
                    //cek jika file gambarnya default.jpg
                    if ($member['foto_rekening'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto_rekeningLama'));
                    }
                }
                $newUser = [
                    'id_member' => $id_member,
                    'nama_member' => $this->request->getVar('nama_member'),
                    'alamat' => $this->request->getVar('alamat'),
                    'handphone' => $this->request->getVar('handphone'),
                    'whatsapp' => $this->request->getVar('whatsapp'),
                    'usia' => $this->request->getVar('usia'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'rekomendasi' => $this->request->getVar('rekomendasi'),
                    'nama_rekening' => $this->request->getVar('nama_rekening'),
                    'nama_bank' => $this->request->getVar('nama_bank'),
                    'no_rekening' => $this->request->getVar('no_rekening'),
                    'status_member' => $this->request->getVar('status_member'),
                    'foto_ktp' => $Foto_Ktp,
                    'fotodiri_ktp' => $FotoDiri_Ktp,
                    'foto_profile' => $Foto_Profile,
                    'foto_rekening' => $Foto_Rekening
                ];

                $role = $this->request->getVar('role');
                if ($role === null) {
                    $role_default = 'member';
                }
                $user = [
                    'id_member' => $this->request->getVar('id_member'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'role' => $role_default
                ];

                $this->memberModel->save($newUser);
                $this->userModel->save($user);

                session()->setFlashdata('pesan', 'Data berhasil Diubah');
                return redirect()->to('/dataMaster');
            }
        }
        return redirect()->to('/dataMaster/edit/' . $this->request->getVar('id_member'))->withInput();
    }

    public function dataProyek()
    {
        $data =
            [
                'title' => 'Data Proyek',
                'detail' => $this->detailModel->getDetail()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/data-proyek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function detailProyek($id_proyek)
    {
        $data =
            [
                'title' => 'Detail Proyek',
                'detail' => $this->detailModel->getDetail($id_proyek),
                'proyek' => $this->proyekModel->getProyek($id_proyek),
                'tools' => $this->marketingModel->getMarketing($id_proyek),
                // 'brosur' => $this->uploadModel->getBrosur(),
                // 'foto' => $this->uploadModel->getFoto(),
                // 'featured' => $this->uploadModel->getFeatured(),
                // 'pricelist' => $this->uploadModel->getPricelist()
            ];

        // jika tanaman tidak ada di tabel
        if (empty($data['detail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID ' . $id_proyek . ' tidak ditemukan');
        }

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/detail-proyek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function createProyek()
    {
        $data =
            [
                'title' => 'Form Tambah Data Proyek',
                'fasilitas' => $this->fasilitasModel->getFasilitas(),
                'validation' => \Config\Services::validation()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/tambah-proyek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function saveProyek()
    {
        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'brosur1' =>
                [
                    'rules' => 'max_size[brosur1,1024]|is_image[brosur1]|mime_in[brosur1, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'brosur2' =>
                [
                    'rules' => 'max_size[brosur2,1024]|is_image[brosur2]|mime_in[brosur2, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'brosur3' =>
                [
                    'rules' => 'max_size[brosur3,1024]|is_image[brosur3]|mime_in[brosur3, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto1' =>
                [
                    'rules' => 'max_size[foto1,1024]|is_image[foto1]|mime_in[foto1, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto2' =>
                [
                    'rules' => 'max_size[foto2,1024]|is_image[foto2]|mime_in[foto2, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto3' =>
                [
                    'rules' => 'max_size[foto3,1024]|is_image[foto3]|mime_in[foto3, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto4' =>
                [
                    'rules' => 'max_size[foto4,1024]|is_image[foto4]|mime_in[foto4, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto5' =>
                [
                    'rules' => 'max_size[foto5,1024]|is_image[foto5]|mime_in[foto5, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto6' =>
                [
                    'rules' => 'max_size[foto6,1024]|is_image[foto6]|mime_in[foto6, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto7' =>
                [
                    'rules' => 'max_size[foto7,1024]|is_image[foto7]|mime_in[foto7, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto8' =>
                [
                    'rules' => 'max_size[foto8,1024]|is_image[foto8]|mime_in[foto8, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto9' =>
                [
                    'rules' => 'max_size[foto9,1024]|is_image[foto9]|mime_in[foto9, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'featured' =>
                [
                    'rules' => 'max_size[featured,1024]|is_image[featured]|mime_in[featured, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ]
            ];

            if ($this->validate($rules)) {

                //ambil gambar
                $featured = $this->request->getFile('featured');
                //apakah tidak ada gambar yang diupload
                if ($featured->getError() == 4) {
                    $Featured = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Featured = $featured->getRandomName();
                    //pindahkan file ke folder img
                    $featured->move('profile', $Featured);
                }
                //ambil gambar
                $foto1 = $this->request->getFile('foto1');
                //apakah tidak ada gambar yang diupload
                if ($foto1->getError() == 4) {
                    $Foto1 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto1 = $foto1->getRandomName();
                    //pindahkan file ke folder img
                    $foto1->move('profile', $Foto1);
                }
                //ambil gambar
                $foto2 = $this->request->getFile('foto2');
                //apakah tidak ada gambar yang diupload
                if ($foto2->getError() == 4) {
                    $Foto2 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto2 = $foto2->getRandomName();
                    //pindahkan file ke folder img
                    $foto2->move('profile', $Foto2);
                }
                //ambil gambar
                $foto3 = $this->request->getFile('foto3');
                //apakah tidak ada gambar yang diupload
                if ($foto3->getError() == 4) {
                    $Foto3 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto3 = $foto3->getRandomName();
                    //pindahkan file ke folder img
                    $foto3->move('profile', $Foto3);
                }
                //ambil gambar
                $foto4 = $this->request->getFile('foto4');
                //apakah tidak ada gambar yang diupload
                if ($foto4->getError() == 4) {
                    $Foto4 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto4 = $foto4->getRandomName();
                    //pindahkan file ke folder img
                    $foto4->move('profile', $Foto4);
                }
                //ambil gambar
                $foto5 = $this->request->getFile('foto5');
                //apakah tidak ada gambar yang diupload
                if ($foto5->getError() == 4) {
                    $Foto5 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto5 = $foto5->getRandomName();
                    //pindahkan file ke folder img
                    $foto5->move('profile', $Foto5);
                }
                //ambil gambar
                $foto6 = $this->request->getFile('foto6');
                //apakah tidak ada gambar yang diupload
                if ($foto6->getError() == 4) {
                    $Foto6 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto6 = $foto6->getRandomName();
                    //pindahkan file ke folder img
                    $foto6->move('profile', $Foto6);
                }
                //ambil gambar
                $foto7 = $this->request->getFile('foto7');
                //apakah tidak ada gambar yang diupload
                if ($foto7->getError() == 4) {
                    $Foto7 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto7 = $foto7->getRandomName();
                    //pindahkan file ke folder img
                    $foto7->move('profile', $Foto7);
                }
                //ambil gambar
                $foto8 = $this->request->getFile('foto8');
                //apakah tidak ada gambar yang diupload
                if ($foto8->getError() == 4) {
                    $Foto8 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto8 = $foto8->getRandomName();
                    //pindahkan file ke folder img
                    $foto8->move('profile', $Foto8);
                }
                //ambil gambar
                $foto9 = $this->request->getFile('foto9');
                //apakah tidak ada gambar yang diupload
                if ($foto9->getError() == 4) {
                    $Foto9 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Foto9 = $foto9->getRandomName();
                    //pindahkan file ke folder img
                    $foto9->move('profile', $Foto9);
                }
                //ambil gambar
                $brosur1 = $this->request->getFile('brosur1');
                //apakah tidak ada gambar yang diupload
                if ($brosur1->getError() == 4) {
                    $Brosur1 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Brosur1 = $brosur1->getRandomName();
                    //pindahkan file ke folder img
                    $brosur1->move('profile', $Brosur1);
                }
                //ambil gambar
                $brosur2 = $this->request->getFile('brosur2');
                //apakah tidak ada gambar yang diupload
                if ($brosur2->getError() == 4) {
                    $Brosur2 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Brosur2 = $brosur2->getRandomName();
                    //pindahkan file ke folder img
                    $brosur2->move('profile', $Brosur2);
                }
                //ambil gambar
                $brosur3 = $this->request->getFile('brosur3');
                //apakah tidak ada gambar yang diupload
                if ($brosur3->getError() == 4) {
                    $Brosur3 = 'default.jpg';
                } else {
                    //generate nama gambar random
                    $Brosur3 = $brosur3->getRandomName();
                    //pindahkan file ke folder img
                    $brosur3->move('profile', $Brosur3);
                }
                //ambil gambar
                $pricelist1 = $this->request->getFile('pricelist1');
                //apakah tidak ada gambar yang diupload
                if ($pricelist1->getError() == 4) {
                    $Pricelist1 = 'default.pdf';
                } else {
                    //generate nama gambar random
                    $Pricelist1 = $pricelist1->getRandomName();
                    //pindahkan file ke folder img
                    $pricelist1->move('profile', $Pricelist1);
                }
                //ambil gambar
                $pricelist2 = $this->request->getFile('pricelist2');
                //apakah tidak ada gambar yang diupload
                if ($pricelist2->getError() == 4) {
                    $Pricelist2 = 'default.pdf';
                } else {
                    //generate nama gambar random
                    $Pricelist2 = $pricelist2->getRandomName();
                    //pindahkan file ke folder img
                    $pricelist2->move('profile', $Pricelist2);
                }
                //ambil gambar
                $pricelist3 = $this->request->getFile('pricelist3');
                //apakah tidak ada gambar yang diupload
                if ($pricelist3->getError() == 4) {
                    $Pricelist3 = 'default.pdf';
                } else {
                    //generate nama gambar random
                    $Pricelist3 = $pricelist3->getRandomName();
                    //pindahkan file ke folder img
                    $pricelist3->move('profile', $Pricelist3);
                }
                $status_proyek = $this->request->getVar('status_proyek');
                if ($status_proyek === null) {
                    $status_proyekdefault = 'Tersedia';
                }

                $fasilitas = $this->request->getVar('fasilitas');
                $data = implode(' ', $fasilitas);
                $newUser = [
                    'id_proyek' => $this->request->getVar('id_proyek'),
                    'fasilitas' => $data,
                    'kamar_tidur' => $this->request->getVar('kamar_tidur'),
                    'kamar_mandi' => $this->request->getVar('kamar_mandi'),
                    'carport' => $this->request->getVar('carport'),
                    'luas_bangunan' => $this->request->getVar('luas_bangunan'),
                    'luas_tanah' => $this->request->getVar('luas_tanah'),
                    'harga_terendah' => $this->request->getVar('harga_terendah'),
                    'informasi_properti' => $this->request->getVar('informasi_properti'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'lokasi_proyek' => $this->request->getVar('lokasi_proyek'),
                    'wisata_hiburan' => $this->request->getVar('wisata_hiburan'),
                    'status_proyek' => $status_proyekdefault,
                    'fasilitas_kesehatan' => $this->request->getVar('fasilitas_kesehatan'),
                    'fasilitas_pendidikan' => $this->request->getVar('fasilitas_pendidikan'),
                    'fasilitas_komersil' => $this->request->getVar('fasilitas_komersil')
                ];

                $User = [
                    'id_proyek' => $this->request->getVar('id_proyek'),
                    'featured' => $Featured,
                    'foto1' => $Foto1,
                    'foto2' => $Foto2,
                    'foto3' => $Foto3,
                    'foto4' => $Foto4,
                    'foto5' => $Foto5,
                    'foto6' => $Foto6,
                    'foto7' => $Foto7,
                    'foto8' => $Foto8,
                    'foto9' => $Foto9,
                    'video1' => $this->request->getVar('video1'),
                    'video2' => $this->request->getVar('video2'),
                    'video3' => $this->request->getVar('video3'),
                    'brosur1' => $Brosur1,
                    'brosur2' => $Brosur2,
                    'brosur3' => $Brosur3,
                    'pricelist1' => $Pricelist1,
                    'pricelist2' => $Pricelist2,
                    'pricelist3' => $Pricelist3
                ];

                $this->detailModel->save($newUser);
                $this->marketingModel->save($User);

                session()->setFlashdata('pesan', 'Data berhasil Ditambah');
                return redirect()->to('/dataMaster/dataProyek');
            }
        }
        return redirect()->to('/dataMaster/createProyek')->withInput();
    }

    public function deleteProyek($id_detail)
    {
        $this->detailModel->find($id_detail);
        $tools = $this->marketingModel->find($id_detail);
        //cek jika file gambarnya default.jpg
        if ($tools['brosur1'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['brosur1']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['brosur2'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['brosur2']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['brosur3'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['brosur3']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['featured'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['featured']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto1'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto1']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto2'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto2']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto3'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto3']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto4'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto4']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto5'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto5']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto6'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto6']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto7'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto7']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto8'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto8']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['foto9'] != 'default.jpg') {
            //hapus gambar
            unlink('profile/' . $tools['foto9']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['pricelist1'] != 'default.pdf') {
            //hapus gambar
            unlink('profile/' . $tools['pricelist1']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['pricelist2'] != 'default.pdf') {
            //hapus gambar
            unlink('profile/' . $tools['pricelist2']);
        }
        //cek jika file gambarnya default.jpg
        if ($tools['pricelist3'] != 'default.pdf') {
            //hapus gambar
            unlink('profile/' . $tools['pricelist3']);
        }
        //hapus data
        $this->detailModel->delete($id_detail);
        $this->marketingModel->delete($id_detail);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect('master/data-proyek');
    }

    public function editProyek($id_detail)
    {
        $data =
            [
                'title' => 'Form Ubah Data Proyek',
                'validation' => \Config\Services::validation(),
                'detail' => $this->detailModel->getIdproyek($id_detail),
                'tools' => $this->marketingModel->getIdproyek($id_detail),
                'fasilitas' => $this->fasilitasModel->getFasilitas()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/edit-proyek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function updateProyek($id_detail)
    {
        $this->detailModel->getIdproyek($this->request->getVar('id_detail'));
        $tools = $this->marketingModel->getIdproyek($this->request->getVar('id_detail'));

        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'brosur1' =>
                [
                    'rules' => 'max_size[brosur1,1024]|is_image[brosur1]|mime_in[brosur1, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'brosur2' =>
                [
                    'rules' => 'max_size[brosur2,1024]|is_image[brosur2]|mime_in[brosur2, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'brosur3' =>
                [
                    'rules' => 'max_size[brosur3,1024]|is_image[brosur3]|mime_in[brosur3, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto1' =>
                [
                    'rules' => 'max_size[foto1,1024]|is_image[foto1]|mime_in[foto1, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto2' =>
                [
                    'rules' => 'max_size[foto2,1024]|is_image[foto2]|mime_in[foto2, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto3' =>
                [
                    'rules' => 'max_size[foto3,1024]|is_image[foto3]|mime_in[foto3, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto4' =>
                [
                    'rules' => 'max_size[foto4,1024]|is_image[foto4]|mime_in[foto4, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto5' =>
                [
                    'rules' => 'max_size[foto5,1024]|is_image[foto5]|mime_in[foto5, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto6' =>
                [
                    'rules' => 'max_size[foto6,1024]|is_image[foto6]|mime_in[foto6, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto7' =>
                [
                    'rules' => 'max_size[foto7,1024]|is_image[foto7]|mime_in[foto7, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto8' =>
                [
                    'rules' => 'max_size[foto8,1024]|is_image[foto8]|mime_in[foto8, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'foto9' =>
                [
                    'rules' => 'max_size[foto9,1024]|is_image[foto9]|mime_in[foto9, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ],
                'featured' =>
                [
                    'rules' => 'max_size[featured,1024]|is_image[featured]|mime_in[featured, image/jpg,image/jpeg,image/png]',
                    'errors' =>
                    [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang dipilih bukan gambar',
                        'mime_in' => 'Yang dipilih bukan gambar'
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $brosur1 = $this->request->getFile('brosur1');
                //cek gambar, apakah tetap gambar lama
                if ($brosur1->getError() == 4) {
                    $Brosur1 = $this->request->getVar('brosur1_Lama');
                } else {
                    //generate nama file random
                    $Brosur1 = $brosur1->getRandomName();
                    //pindahkan gambar
                    $brosur1->move('profile', $Brosur1);
                    //cek jika file gambarnya default.jpg
                    if ($tools['brosur1'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('brosur1_Lama'));
                    }
                }
                $brosur2 = $this->request->getFile('brosur2');
                //cek gambar, apakah tetap gambar lama
                if ($brosur2->getError() == 4) {
                    $Brosur2 = $this->request->getVar('brosur2_Lama');
                } else {
                    //generate nama file random
                    $Brosur2 = $brosur2->getRandomName();
                    //pindahkan gambar
                    $brosur2->move('profile', $Brosur2);
                    //cek jika file gambarnya default.jpg
                    if ($tools['brosur2'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('brosur2_Lama'));
                    }
                }
                $brosur3 = $this->request->getFile('brosur3');
                //cek gambar, apakah tetap gambar lama
                if ($brosur3->getError() == 4) {
                    $Brosur3 = $this->request->getVar('brosur3_Lama');
                } else {
                    //generate nama file random
                    $Brosur3 = $brosur3->getRandomName();
                    //pindahkan gambar
                    $brosur3->move('profile', $Brosur3);
                    //cek jika file gambarnya default.jpg
                    if ($tools['brosur3'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('brosur3_Lama'));
                    }
                }
                $featured = $this->request->getFile('featured');
                //cek gambar, apakah tetap gambar lama
                if ($featured->getError() == 4) {
                    $Featured = $this->request->getVar('featured_Lama');
                } else {
                    //generate nama file random
                    $Featured = $featured->getRandomName();
                    //pindahkan gambar
                    $featured->move('profile', $Featured);
                    //cek jika file gambarnya default.jpg
                    if ($tools['featured'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('featured_Lama'));
                    }
                }
                $foto1 = $this->request->getFile('foto1');
                //cek gambar, apakah tetap gambar lama
                if ($foto1->getError() == 4) {
                    $Foto1 = $this->request->getVar('foto1_Lama');
                } else {
                    //generate nama file random
                    $Foto1 = $foto1->getRandomName();
                    //pindahkan gambar
                    $foto1->move('profile', $Foto1);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto1'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto1_Lama'));
                    }
                }
                $foto2 = $this->request->getFile('foto2');
                //cek gambar, apakah tetap gambar lama
                if ($foto2->getError() == 4) {
                    $Foto2 = $this->request->getVar('foto2_Lama');
                } else {
                    //generate nama file random
                    $Foto2 = $foto2->getRandomName();
                    //pindahkan gambar
                    $foto2->move('profile', $Foto2);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto2'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto2_Lama'));
                    }
                }
                $foto3 = $this->request->getFile('foto3');
                //cek gambar, apakah tetap gambar lama
                if ($foto3->getError() == 4) {
                    $Foto3 = $this->request->getVar('foto3_Lama');
                } else {
                    //generate nama file random
                    $Foto3 = $foto3->getRandomName();
                    //pindahkan gambar
                    $foto3->move('profile', $Foto3);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto3'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto3_Lama'));
                    }
                }
                $foto4 = $this->request->getFile('foto4');
                //cek gambar, apakah tetap gambar lama
                if ($foto4->getError() == 4) {
                    $Foto4 = $this->request->getVar('foto4_Lama');
                } else {
                    //generate nama file random
                    $Foto4 = $foto4->getRandomName();
                    //pindahkan gambar
                    $foto4->move('profile', $Foto4);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto4'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto4_Lama'));
                    }
                }
                $foto5 = $this->request->getFile('foto5');
                //cek gambar, apakah tetap gambar lama
                if ($foto5->getError() == 4) {
                    $Foto5 = $this->request->getVar('foto5_Lama');
                } else {
                    //generate nama file random
                    $Foto5 = $foto5->getRandomName();
                    //pindahkan gambar
                    $foto5->move('profile', $Foto5);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto5'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto5_Lama'));
                    }
                }
                $foto6 = $this->request->getFile('foto6');
                //cek gambar, apakah tetap gambar lama
                if ($foto6->getError() == 4) {
                    $Foto6 = $this->request->getVar('foto6_Lama');
                } else {
                    //generate nama file random
                    $Foto6 = $foto6->getRandomName();
                    //pindahkan gambar
                    $foto6->move('profile', $Foto6);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto6'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto6_Lama'));
                    }
                }
                $foto7 = $this->request->getFile('foto7');
                //cek gambar, apakah tetap gambar lama
                if ($foto7->getError() == 4) {
                    $Foto7 = $this->request->getVar('foto7_Lama');
                } else {
                    //generate nama file random
                    $Foto7 = $foto7->getRandomName();
                    //pindahkan gambar
                    $foto7->move('profile', $Foto7);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto7'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto7_Lama'));
                    }
                }
                $foto8 = $this->request->getFile('foto8');
                //cek gambar, apakah tetap gambar lama
                if ($foto8->getError() == 4) {
                    $Foto8 = $this->request->getVar('foto8_Lama');
                } else {
                    //generate nama file random
                    $Foto8 = $foto8->getRandomName();
                    //pindahkan gambar
                    $foto8->move('profile', $Foto8);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto8'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto8_Lama'));
                    }
                }
                $foto9 = $this->request->getFile('foto9');
                //cek gambar, apakah tetap gambar lama
                if ($foto9->getError() == 4) {
                    $Foto9 = $this->request->getVar('foto9_Lama');
                } else {
                    //generate nama file random
                    $Foto9 = $foto9->getRandomName();
                    //pindahkan gambar
                    $foto9->move('profile', $Foto9);
                    //cek jika file gambarnya default.jpg
                    if ($tools['foto9'] != 'default.jpg') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('foto9_Lama'));
                    }
                }
                $pricelist1 = $this->request->getFile('pricelist1');
                //cek gambar, apakah tetap gambar lama
                if ($pricelist1->getError() == 4) {
                    $Pricelist1 = $this->request->getVar('pricelist1_Lama');
                } else {
                    //generate nama file random
                    $Pricelist1 = $pricelist1->getRandomName();
                    //pindahkan gambar
                    $pricelist1->move('profile', $Pricelist1);
                    //cek jika file gambarnya default.jpg
                    if ($tools['pricelist1'] != 'default.pdf') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('pricelist1_Lama'));
                    }
                }
                $pricelist2 = $this->request->getFile('pricelist2');
                //cek gambar, apakah tetap gambar lama
                if ($pricelist2->getError() == 4) {
                    $Pricelist2 = $this->request->getVar('pricelist2_Lama');
                } else {
                    //generate nama file random
                    $Pricelist2 = $pricelist2->getRandomName();
                    //pindahkan gambar
                    $pricelist2->move('profile', $Pricelist2);
                    //cek jika file gambarnya default.jpg
                    if ($tools['pricelist2'] != 'default.pdf') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('pricelist2_Lama'));
                    }
                }
                $pricelist3 = $this->request->getFile('pricelist3');
                //cek gambar, apakah tetap gambar lama
                if ($pricelist3->getError() == 4) {
                    $Pricelist3 = $this->request->getVar('pricelist3_Lama');
                } else {
                    //generate nama file random
                    $Pricelist3 = $pricelist3->getRandomName();
                    //pindahkan gambar
                    $pricelist3->move('profile', $Pricelist3);
                    //cek jika file gambarnya default.jpg
                    if ($tools['pricelist3'] != 'default.pdf') {
                        //hapus gambar
                        unlink('profile/' . $this->request->getVar('pricelist3_Lama'));
                    }
                }

                $fasilitas = $this->request->getVar('fasilitas');
                $data = implode(' ', $fasilitas);
                $newUser = [
                    'id_detail' => $id_detail,
                    'id_proyek' => $this->request->getVar('id_proyek'),
                    'fasilitas' => $data,
                    'kamar_tidur' => $this->request->getVar('kamar_tidur'),
                    'kamar_mandi' => $this->request->getVar('kamar_mandi'),
                    'carport' => $this->request->getVar('carport'),
                    'luas_bangunan' => $this->request->getVar('luas_bangunan'),
                    'luas_tanah' => $this->request->getVar('luas_tanah'),
                    'harga_terendah' => $this->request->getVar('harga_terendah'),
                    'informasi_properti' => $this->request->getVar('informasi_properti'),
                    'deskripsi' => $this->request->getVar('deskripsi'),
                    'lokasi_proyek' => $this->request->getVar('lokasi_proyek'),
                    'wisata_hiburan' => $this->request->getVar('wisata_hiburan'),
                    'status_proyek' => $status = $this->request->getVar('status_proyek'),
                    'fasilitas_kesehatan' => $this->request->getVar('fasilitas_kesehatan'),
                    'fasilitas_pendidikan' => $this->request->getVar('fasilitas_pendidikan'),
                    'fasilitas_komersil' => $this->request->getVar('fasilitas_komersil')
                ];

                $User = [
                    'id_detail' => $this->request->getVar('id_detail'),
                    'id_proyek' => $this->request->getVar('id_proyek'),
                    'featured' => $Featured,
                    'foto1' => $Foto1,
                    'foto2' => $Foto2,
                    'foto3' => $Foto3,
                    'foto4' => $Foto4,
                    'foto5' => $Foto5,
                    'foto6' => $Foto6,
                    'foto7' => $Foto7,
                    'foto8' => $Foto8,
                    'foto9' => $Foto9,
                    'video1' => $this->request->getVar('video1'),
                    'video2' => $this->request->getVar('video2'),
                    'video3' => $this->request->getVar('video3'),
                    'brosur1' => $Brosur1,
                    'brosur2' => $Brosur2,
                    'brosur3' => $Brosur3,
                    'pricelist1' => $Pricelist1,
                    'pricelist2' => $Pricelist2,
                    'pricelist3' => $Pricelist3
                ];

                $this->detailModel->save($newUser);
                $this->marketingModel->save($User);

                session()->setFlashdata('pesan', 'Data berhasil Diubah');
                return redirect()->to('/dataMaster/dataProyek');
            }
        }
        return redirect()->to('/dataMaster/editProyek/' . $this->request->getVar('id_detail'))->withInput();
    }

    public function dataFasilitas()
    {
        $data =
            [
                'title' => 'Fasilitas Properti',
                'fasilitas' => $this->fasilitasModel->getFasilitas()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/fasilitas-properti', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function createFasilitas()
    {
        $data =
            [
                'title' => 'Form Tambah Data Fasilitas',
                'validation' => \Config\Services::validation()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/tambah-fasilitas', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function saveFasilitas()
    {
        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'nama_fasilitas' =>
                [
                    'rules' => 'required|is_unique[fasilitas.nama_fasilitas]',
                    'errors' =>
                    [
                        'required' => 'Nama Fasilitas harus diisi',
                        'is_unique' => 'Nama Fasilitas sudah ada di database'
                    ]
                ]
            ];

            if ($this->validate($rules)) {

                $newUser = [
                    'nama_fasilitas' => $this->request->getVar('nama_fasilitas'),
                    'icon' => $this->request->getVar('icon')
                ];

                $this->fasilitasModel->save($newUser);

                session()->setFlashdata('pesan', 'Data berhasil Ditambah');
                return redirect()->to('/dataMaster/dataFasilitas');
            }
        }
        return redirect()->to('/dataMaster/createFasilitas')->withInput();
    }

    public function deleteFasilitas($id_fasilitas)
    {
        $this->fasilitasModel->find($id_fasilitas);

        //hapus data
        $this->fasilitasModel->delete($id_fasilitas);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect('master/fasilitas-properti');
    }

    public function editFasilitas($id_fasilitas)
    {
        $data =
            [
                'title' => 'Form Ubah Data Proyek',
                'validation' => \Config\Services::validation(),
                'fasilitas' => $this->fasilitasModel->getFasilitas($id_fasilitas)
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/edit-fasilitas', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function updateFasilitas($id_fasilitas)
    {
        $this->fasilitasModel->getFasilitas($this->request->getVar('id_fasilitas'));

        $method = $this->request->getVar();
        if ($method) {
            $rules = [
                'nama_fasilitas' =>
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
                    'id_fasilitas' => $id_fasilitas,
                    'nama_fasilitas' => $this->request->getVar('nama_fasilitas'),
                    'icon' => $this->request->getVar('icon')
                ];

                $this->fasilitasModel->save($newUser);

                session()->setFlashdata('pesan', 'Data berhasil Diubah');
                return redirect()->to('/dataMaster/dataFasilitas');
            }
        }
        return redirect()->to('/dataMaster/editFasilitas/' . $this->request->getVar('id_fasilitas'))->withInput();
    }

    public function dataProspek()
    {
        $data =
            [
                'title' => 'Data Prospek',
                'prospek' => $this->prospekModel->getProspek()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/data-prospek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function createProspek()
    {
        $data =
            [
                'title' => 'Form Tambah Data Prospek',
                'validation' => \Config\Services::validation()
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/tambah-prospek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function saveProspek()
    {
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
                    'nama_customer' => $this->request->getVar('nama_customer'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'status_hubungan' => $this->request->getVar('status_hubungan'),
                    'status_prospek' => $this->request->getVar('status_prospek'),
                    'proyek_diminati' => $this->request->getVar('proyek_diminati'),
                    'range_harga' => $this->request->getVar('range_harga'),
                    'jadwal_survei' => $this->request->getVar('jadwal_survei'),
                    'keterangan' => $this->request->getVar('keterangan')
                ];

                $status_pencairan = $this->request->getVar('status_pencairan');
                if ($status_pencairan === null) {
                    $status_pencairandefault = 'Belum Cair';
                }

                $User = [
                    'nama_member' => $this->request->getVar('nama_member'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status_pencairan' => $status_pencairandefault,
                    'status_prospek' => $this->request->getVar('status_prospek'),
                ];

                $this->prospekModel->save($newUser);
                $this->komisiModel->save($User);

                session()->setFlashdata('pesan', 'Data berhasil Ditambah');
                return redirect()->to('/dataMaster/dataProspek');
            }
        }
        return redirect()->to('/dataMaster/createProspek')->withInput();
    }

    public function deleteProspek($id_prospek)
    {
        $this->prospekModel->find($id_prospek);
        $this->komisiModel->find($id_prospek);
        //hapus data
        $this->prospekModel->delete($id_prospek);
        $this->komisiModel->delete($id_prospek);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect('master/data-prospek');
    }

    public function editProspek($id_prospek)
    {
        $data =
            [
                'title' => 'Form Ubah Data Prospek',
                'validation' => \Config\Services::validation(),
                'prospek' => $this->prospekModel->getProspek($id_prospek),
                'komisi' => $this->komisiModel->getKomisi($id_prospek)
            ];

        if (session()->has('logged_in') and session()->get('logged_in') == true) {
            return view('master/edit-prospek', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function updateProspek($id_prospek)
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

                $status_pencairan = $this->request->getVar('status_pencairan');
                if ($status_pencairan === null) {
                    $status_pencairandefault = 'Belum Cair';
                }

                $User = [
                    'id_prospek' => $this->request->getVar('id_prospek'),
                    'nama_member' => $this->request->getVar('nama_member'),
                    'keterangan' => $this->request->getVar('keterangan'),
                    'status_pencairan' => $status_pencairandefault,
                    'status_prospek' => $this->request->getVar('status_prospek'),
                ];

                $this->prospekModel->save($newUser);
                $this->komisiModel->save($User);

                session()->setFlashdata('pesan', 'Data berhasil Diubah');
                return redirect()->to('/dataMaster/dataProspek');
            }
        }
        return redirect()->to('/dataMaster/editProspek/' . $this->request->getVar('id_prospek'))->withInput();
    }

    // public function createUpload()
    // {
    //     $data =
    //         [
    //             'title' => 'Data Upload',
    //             'validation' => \Config\Services::validation()
    //         ];
    //     return view('master/tambah-upload', $data);
    // }

    // public function saveUpload()
    // {
    //     $id_proyek = $this->request->getPost('id_proyek');
    //     $jenis_file = $this->request->getPost('jenis_file');
    //     $nama_file = $this->request->getFiles();

    //     if ($nama_file) {
    //         foreach ($nama_file['nama_file'] as $img) {
    //             $img->move(ROOTPATH . 'public/img');
    //             $data_upload = [
    //                 'id_proyek' => $id_proyek,
    //                 'jenis_file' => $jenis_file,
    //                 'nama_file' => $img->getName(),
    //             ];
    //             $this->uploadModel->insert_upload($data_upload);
    //         }
    //         session()->setFlashdata('pesan', 'File Berhasil Diupload, Silahkan Jika Masih Ada Yang Ingin Di Upload');
    //         return redirect()->to('/dataMaster/createUpload');
    //     }
    // }
}
