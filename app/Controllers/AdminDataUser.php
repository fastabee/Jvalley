<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AdminDataUser extends BaseController
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }
    public function index()
    {
        $dataUser = $this->authModel->where(['level' => 'user'])->findAll();
        $data = [
            'title' => 'Data User',
            'menu' => 'data_user',
            'user' => $dataUser

        ];
        echo view("admin/data_user", $data);
    }
    public function edit_user($id = false)
    {
        $dataUser = $this->authModel->where(['id_user' => $id])->first();
        $data = [
            'title' => 'Edit User',
            'menu' => 'data_user',
            'user' => $dataUser

        ];
        return view('admin/edit_user', $data);
    }
    public function edit_save()
    {
        $request = service('request');

        $id_user = $request->getPost('id_user');
        $nama = $request->getPost('nama_lengkap');
        $username = $request->getPost('username');
        $email = $request->getPost('email');

        $data = [
            'nama_lengkap' => $nama,
            'username' => $username,
            'email' => $email,
        ];
        $this->authModel->update($id_user, $data);

        session()->setFlashdata('message', 'Data user berhasil diupdate');
        return redirect()->to('/data_user');
    }
    public function delete_user($id = false)
    {
        $this->authModel->delete($id);
        session()->setFlashdata('message', 'Data user berhasil dihapus');
        return redirect()->to('/data_user');
    }
}
