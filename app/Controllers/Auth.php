<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $method = $this->request->getPost();
        if ($method) {
            $rules = [
                'email' => 'required',
                'password' => 'required'
            ];
            $validate = $this->validate($rules);
            if ($validate) {
                //disini lakukan proses pengecekan password
                $password = $this->request->getPost('password');
                $email = $this->request->getPost('email');

                $userModel = new \App\Models\UserModel();
                $user = $userModel->asObject()->where('email', $email)->first();
                if ($user) {
                    if (password_verify($password, $user->password)) {
                        session()->set([
                            'id_member' => $user->id_member,
                            'logged_in' => true
                        ]);

                        return redirect()->to('/home');
                    }
                }
                return redirect()->back()->withInput()->with('error', 'Email atau Password Salah');
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
