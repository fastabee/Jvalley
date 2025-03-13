<?php

namespace App\Controllers;

use App\Models\MitraModel;

class AdminDataMitra extends BaseController
{
    protected $MitraModel;

    public function __construct()
    {
        $this->MitraModel = new MitraModel();
    }
    public function index()
    {
        $datamitra = $this->MitraModel->findAll();
        $data = [
            'title' => 'Data mitra',
            'menu' => 'data_mitra',
            'mitra' => $datamitra

        ];
        echo view("admin/data_mitra", $data);
    }
    public function tambah_mitra()
    {
        $data = [
            'title' => 'Data mitra',
            'menu' => 'data_mitra',
        ];
        echo view("admin/tambah_mitra", $data);
    }
    public function save_mitra()
    {
        if (!$this->validate([
            'nama_mitra' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mitra tidak boleh kosong !',
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/jpe]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'extension gambar tidak support'
                ]
            ],
        ])) {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/tambah_mitra')->withInput();
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            $this->MitraModel->save([
                'foto' => $namaGambar,
                'nama_mitra' => $this->request->getVar('nama_mitra'),
            ]);
            session()->setFlashdata('message', 'berhasil menambah mitra baru');
            return redirect()->to('/data_mitra');
        }
    }
    public function edit_mitra($id = false)
    {
        $datamitra = $this->MitraModel->where(['id_mitra' => $id])->first();
        $data = [
            'title' => 'Edit mitra',
            'menu' => 'data_mitra',
            'mitra' => $datamitra
        ];
        return view('admin/edit_mitra', $data);
    }
    public function edit_save()
    {
        $request = service('request');

        $id_mitra = $request->getPost('id_mitra');
        $nama = $request->getPost('nama_mitra');
        $namaGambar = $this->request->getVar('gambarLama');
        // Periksa apakah ada gambar yang diunggah
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar && $fileGambar->isValid()) {
            // Jika ada gambar yang diunggah, simpan gambar ke direktori 'img' dan dapatkan nama filenya
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            unlink('img/' . $this->request->getVar('gambarLama'));
        } else {
            // Jika tidak ada gambar yang diunggah, gunakan gambar default
            $namaGambar = $namaGambar;
        }

        $data = [
            'nama_mitra' => $nama,
            'foto' => $namaGambar,
        ];
        $this->MitraModel->update($id_mitra, $data);

        session()->setFlashdata('message', 'Data mitra berhasil diupdate');
        return redirect()->to('/data_mitra');
    }
    public function delete_mitra($id = false)
    {
        $this->MitraModel->delete($id);
        session()->setFlashdata('message', 'Data mitra berhasil dihapus');
        return redirect()->to('/data_mitra');
    }
}
