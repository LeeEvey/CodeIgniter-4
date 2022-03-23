<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\UserModel;

class Home extends BaseController
{
	protected $memberModel;
	protected $userModel;
	public function __construct()
	{
		$this->memberModel = new MemberModel();
		$this->userModel = new UserModel();
	}
	public function index()
	{
		$data =
			[
				'title' => 'Halaman Dashboard',
			];
		if (session()->has('logged_in') and session()->get('logged_in') == true) {
			return view('dashboard/index', $data);
		} else {
			return redirect()->to('/');
		}
	}

	public function pesanBroadcast()
	{
		$data =
			[
				'title' => 'Halaman Broadcast'
			];

		if (session()->has('logged_in') and session()->get('logged_in') == true) {
			return view('dashboard/broadcast', $data);
		} else {
			return redirect()->to('/');
		}
	}

	public function pesanDirect()
	{
		$data =
			[
				'title' => 'Halaman Direct Message'
			];

		if (session()->has('logged_in') and session()->get('logged_in') == true) {
			return view('dashboard/direct-message', $data);
		} else {
			return redirect()->to('/');
		}
	}

	public function profile($id_member)
	{
		$data =
			[
				'title' => 'Halaman Profile',
				'member' => $this->memberModel->getMember($id_member),
				'user' => $this->userModel->getUser($id_member)
			];

		// jika tanaman tidak ada di tabel
		if (empty($data['member'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('ID ' . $id_member . ' tidak ditemukan');
		}

		if (session()->has('logged_in') and session()->get('logged_in') == true) {
			return view('dashboard/profile', $data);
		} else {
			return redirect()->to('/');
		}
	}
}
