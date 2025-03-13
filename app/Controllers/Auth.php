<?php

namespace App\Controllers;

use App\Models\AuthModel;



class Auth extends BaseController
{
    protected $AuthModel;

    public function __construct()
    {
        helper('form');
        $this->AuthModel = new AuthModel();
    }
    public function login()
    {
        echo view("user/login");
    }

    public function pendaftaran()
    {
        echo view("user/pendaftaran");
    }
    public function loginadmin()
    {
        echo view("admin/loginadmin");
    }
    public function save_register()
    {
        if ($this->validate([
            'nama_lengkap' => [
                'label' => 'Nama lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'

                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !',
                    'is_unique' => '{field} sudah terdaftar, gunakan username lain!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
        ])) {
            // jika valid
            $data = array(
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => 'user',
            );
            $this->AuthModel->save_register($data);
            session()->setFlashdata('message', 'Berhasil daftar, silahkan Log in');
            return redirect()->to(base_url('/login'));
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/pendaftaran'))->withInput();
        }
    }

    public function cek_login_admin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
        ])) {
            // jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->AuthModel->login($username, $password);
            if ($cek) {
                //jika cocok
                session()->set('log', true);
                session()->set('id_user', $cek['id_user']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('nama_lengkap', $cek['nama_lengkap']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                //percabangan admin & user
                if ($cek['level'] == 'admin') {
                    return redirect()->to(base_url('data_user'));
                } elseif ($cek['level'] == 'user') {
                    session()->setFlashdata('salah', 'Anda bukan user !');
                    return redirect()->to(base_url('loginadmin'));
                }
            } else {
                //jika email dan password tidak valid
                session()->setFlashdata('salah', 'Email atau password anda salah!');
                return redirect()->to(base_url('loginadmin'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('loginadmin'));
        }
    }
    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !'
                ]
            ],
        ])) {
            // jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->AuthModel->login($username, $password);
            if ($cek) {
                //jika cocok
                session()->set('log', true);
                session()->set('id_user', $cek['id_user']);
                session()->set('email', $cek['email']);
                session()->set('password', $cek['password']);
                session()->set('nama_lengkap', $cek['nama_lengkap']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                //percabangan admin & user
                if ($cek['level'] == 'admin') {
                    session()->setFlashdata('salah', 'Anda bukan admin !');
                    return redirect()->to(base_url('login'));
                } elseif ($cek['level'] == 'user') {
                    return redirect()->to(base_url('member_kursus'));
                }
            } else {
                //jika email dan password tidak valid
                session()->setFlashdata('salah', 'Username atau password anda salah!');
                return redirect()->to(base_url('login'));
            }
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }


    public function ganpas()
    {
        $email = $this->request->getPost('email');
        $user = $this->AuthModel->getUserByEmail($email)->getRow();
        $id = $user->id_user;
        $angka = rand(100000, 999999);
        var_dump($angka);
        $data = array(
            'otp' => $angka
        );
        $result = $this->AuthModel->update($id, $data);
        if ($result) {



            $emailke = \Config\Services::email();

            $emailke->setFrom('fastabikul87@gmail.com', 'Administrasi Jvalley');
            $emailke->setTo($email);
            $emailke->setSubject('Reset Password');
            $emailke->setMessage($angka);

            try {
                if ($emailke->send()) {
                    session()->setFlashdata('sukses', 'Berhasil Menambahkan Data');
                    echo "email terkirim";
                } else {
                    throw new \Exception($emailke->printDebugger(['headers']));
                }
            } catch (\Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            return redirect()->to(base_url('otp/' . $id));
        }
    }

    public function otp($id)
    {

        $data = array(
            'id' => $id
        );
        return view('user/otp.php', $data);
    }

    public function cekotp()
    {
        $id = $this->request->getPost('id_user');
        $inputotp = $this->request->getPost('otp');
        $user = $this->AuthModel->getUserById($id)->getRow();
        $otp = $user->otp;
        if ($inputotp == $otp) {
            $data = array(
                'id' => $id
            );
            return redirect()->to(base_url('change/password/' . $id));
        } else {
            session()->setFlashdata('error', 'Otp Salah');
            return redirect()->to(base_url('otp/' . $id));
        }
    }

    public function change($id)
    {
        $data = array(
            'id' => $id
        );
        return view('user/change.php', $data);
    }

    public function cpas()
    {
        $id = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');
        $data = array(
            'password' => $password
        );
        $result = $this->AuthModel->update($id, $data);
        if ($result) {
            return redirect()->to(base_url('/login'));
        }
    }
}
