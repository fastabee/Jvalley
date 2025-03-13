<?php

namespace App\Controllers;

use App\Models\PengajarModel;

class AdminDataPengajar extends BaseController
{
    protected $pengajarModel;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
    }
    public function index()
    {
        $datapengajar = $this->pengajarModel->findAll();
        $data = [
            'title' => 'Data Pengajar',
            'menu' => 'data_pengajar',
            'pengajar' => $datapengajar

        ];
        echo view("admin/data_pengajar", $data);
    }
    public function tambah_pengajar()
    {
        $data = [
            'title' => 'Data Pengajar',
            'menu' => 'data_pengajar',
        ];
        echo view("admin/tambah_pengajar", $data);
    }
    public function save_pengajar()
    {        
        if (!$this->validate([
            'nama_pengajar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengajar tidak boleh kosong !',
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
            return redirect()->to('/tambah_pengajar')->withInput();
        } else {
            //jika valid
            $fileGambar = $this->request->getFile('gambar');
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $namaGambar);
            $this->pengajarModel->save([
                'foto' => $namaGambar,
                'nama_pengajar' => $this->request->getVar('nama_pengajar'),
            ]);
            session()->setFlashdata('message', 'berhasil menambah pengajar baru');
            return redirect()->to('/data_pengajar');
        }
    }
    public function edit_pengajar($id = false)
    {
        $datapengajar = $this->pengajarModel->where(['id_pengajar' => $id])->first();
        $data = [
            'title' => 'Edit pengajar',
            'menu' => 'data_pengajar',
            'pengajar' => $datapengajar
        ];
        return view('admin/edit_pengajar', $data);
    }
    public function edit_save()
    {
        $request = service('request');

        $id_pengajar = $request->getPost('id_pengajar');
        $nama = $request->getPost('nama_pengajar');
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
            'nama_pengajar' => $nama,
            'foto' => $namaGambar,
        ];
        $this->pengajarModel->update($id_pengajar, $data);

        session()->setFlashdata('message', 'Data pengajar berhasil diupdate');
        return redirect()->to('/data_pengajar');
    }
    public function delete_pengajar($id = false)
    {
        $this->pengajarModel->delete($id);
        session()->setFlashdata('message', 'Data pengajar berhasil dihapus');
        return redirect()->to('/data_pengajar');
    }
}
