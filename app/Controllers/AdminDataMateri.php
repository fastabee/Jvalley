<?php

namespace App\Controllers;

use App\Models\MateriModel;
use App\Models\ModulModel;

class AdminDataMateri extends BaseController
{
    protected $ModulModel;
    protected $MateriModel;

    public function __construct()
    {
        $this->ModulModel = new ModulModel();
        $this->MateriModel = new MateriModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $dataMateri = $this->ModulModel->search($keyword);
        } else {
            $dataMateri = $this->ModulModel->getMateriWithModul();
        }

        $data = [
            'title' => 'Data Modul',
            'menu' => 'data_materi',
            'materi' => $dataMateri
        ];

        echo view("admin/data_materi", $data);
    }

    public function tambah_materi()
    {
        $datamodul = $this->ModulModel->findAll();
        $data = [
            'title' => 'Tambah Modul',
            'menu' => 'data_materi',
            'modul' => $datamodul
        ];
        echo view("admin/tambah_materi", $data);
    }
    public function save_materi()
    {
        if (!$this->validate([
            'nama_modul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih modul terlebih dahulu !',
                ]
            ],
            'judul_materi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul materi tidak boleh kosong !',
                ]
            ],
            'link_youtube' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link youtube tidak boleh kosong !',
                ]
            ],

        ])) {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/tambah_materi')->withInput();
        } else {
            //jika valid
            $youtubeUrl = $this->request->getPost('link_youtube');
            $videoId = $this->extractYoutubeId($youtubeUrl);

            if ($videoId) {
                $embedUrl = "https://www.youtube.com/embed/" . $videoId;
            } else {
                session()->setFlashdata('error', 'Link youtube tidak valid');
                return redirect()->to('/tambah_materi')->withInput();
            }
            $this->MateriModel->save([
                'id_modul' => $this->request->getVar('nama_modul'),
                'judul_materi' => $this->request->getVar('judul_materi'),
                'link_youtube' => $embedUrl
            ]);
            session()->setFlashdata('message', 'berhasil menambah materi baru');
            return redirect()->to('/data_materi');
        }
    }

    private function extractYoutubeId($url)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $urlParams);
        return $urlParams['v'] ?? null;
    }

    public function edit_materi($id = false)
    {
        $materi = $this->MateriModel->where(['id_materi' => $id])->first();
        $datamodul = $this->ModulModel->findAll();
        if ($materi) {
            // Convert embed URL back to standard YouTube URL
            $materi['link_youtube'] = $this->convertEmbedToStandard($materi['link_youtube']);
        }
        // Handle case where materi not found
        $data = [
            'title' => 'Edit Materi',
            'menu' => 'data_materi',
            'materi' => $materi,
            'modul' => $datamodul
        ];
        return view('admin/edit_materi', $data);
    }
    private function convertEmbedToStandard($embedUrl)
    {
        $urlParts = parse_url($embedUrl);

        // Cek apakah host adalah youtube.com atau youtu.be
        if (isset($urlParts['host'])) {
            if (strpos($urlParts['host'], 'youtube.com') !== false) {
                // Cek apakah terdapat komponen query
                if (isset($urlParts['query'])) {
                    parse_str($urlParts['query'], $queryParts);
                    return isset($queryParts['v']) ? 'https://www.youtube.com/watch?v=' . $queryParts['v'] : $embedUrl;
                }
            } elseif (strpos($urlParts['host'], 'youtu.be') !== false) {
                // Format youtu.be/VIDEO_ID
                $videoId = ltrim($urlParts['path'], '/');
                return 'https://www.youtube.com/watch?v=' . $videoId;
            }
        }

        // Cek apakah path mengandung /embed/VIDEO_ID
        if (isset($urlParts['path'])) {
            if (strpos($urlParts['path'], '/embed/') === 0) {
                $videoId = ltrim($urlParts['path'], '/embed/');
                return 'https://www.youtube.com/watch?v=' . $videoId;
            }
        }

        // Return original URL if no matches found
        return $embedUrl;
    }

    public function edit_save()
    {
        $id_materi = $this->request->getVar('id_materi');
        $youtubeUrl = $this->request->getPost('link_youtube');
        $videoId = $this->extractYoutubeId($youtubeUrl);

        if ($videoId) {
            $embedUrl = "https://www.youtube.com/embed/" . $videoId;
        } else {
            session()->setFlashdata('error', 'Link youtube tidak valid');
            return redirect()->to(base_url('edit_materi/' . $id_materi));
        }

        $data = [
            'id_modul' => $this->request->getVar('nama_modul'),
            'judul_materi' => $this->request->getVar('judul_materi'),
            'link_youtube' => $embedUrl
        ];
        $this->MateriModel->update($id_materi, $data);

        session()->setFlashdata('message', 'Data materi berhasil diupdate');
        return redirect()->to('/data_materi');
    }
    public function delete_materi($id = false)
    {
        $this->MateriModel->delete($id);
        session()->setFlashdata('message', 'Data materi berhasil dihapus');
        return redirect()->to('/data_materi');
    }
}
