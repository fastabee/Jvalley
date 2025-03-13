<?php

namespace App\Controllers;

use App\Models\ModulModel;

class AdminDataModul extends BaseController
{
    protected $ModulModel;

    public function __construct()
    {
        $this->ModulModel = new ModulModel();
    }
    public function index()
    {
        $datamodul = $this->ModulModel->findAll();
        $data = [
            'title' => 'Data Modul',
            'menu' => 'data_modul',
            'modul' => $datamodul

        ];
        echo view("admin/data_modul", $data);
    }
    public function tambah_modul()
    {
        $data = [
            'title' => 'Tambah Modul',
            'menu' => 'data_modul',
        ];
        echo view("admin/tambah_modul", $data);
    }
    public function save_modul()
    {
        if (!$this->validate([
            'nama_modul' => [
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
            return redirect()->to('/tambah_modul')->withInput();
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            $this->ModulModel->save([
                'foto' => $namaGambar,
                'nama_modul' => $this->request->getVar('nama_modul'),
            ]);
            session()->setFlashdata('message', 'berhasil menambah modul baru');
            return redirect()->to('/data_modul');
        }
    }
    public function edit_modul($id = false)
    {
        $datamodul = $this->ModulModel->where(['id_modul' => $id])->first();
        $data = [
            'title' => 'Edit Modul',
            'menu' => 'data_modul',
            'modul' => $datamodul
        ];
        return view('admin/edit_modul', $data);
    }
    public function edit_save()
    {
        $request = service('request');

        $id_modul = $request->getPost('id_modul');
        $nama = $request->getPost('nama_modul');
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
            'nama_modul' => $nama,
            'foto' => $namaGambar,
        ];
        $this->ModulModel->update($id_modul, $data);

        session()->setFlashdata('message', 'Data Modul berhasil diupdate');
        return redirect()->to('/data_modul');
    }
    public function delete_modul($id = false)
    {
        $this->ModulModel->delete($id);
        session()->setFlashdata('message', 'Data Modul berhasil dihapus');
        return redirect()->to('/data_modul');
    }
}
