<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\MateriModel;
use App\Models\MitraModel;
use App\Models\ModulModel;
use App\Models\PengajarModel;
use App\Models\ProgressModel;

class Page extends BaseController
{
    protected $pengajarModel;
    protected $mitraModel;
    protected $modulModel;
    protected $materiModel;
    protected $progressModel;
    protected $authModel;

    public function __construct()
    {
        $this->pengajarModel = new PengajarModel();
        $this->mitraModel = new MitraModel();
        $this->modulModel = new ModulModel();
        $this->materiModel = new MateriModel();
        $this->progressModel = new ProgressModel();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $pengajar = $this->pengajarModel->findAll();
        $mitra = $this->mitraModel->findAll();

        $data = [
            'pengajar' => $pengajar,
            'mitra' => $mitra,
        ];
        echo view("index", $data);
    }

    public function lupa_password()
    {
        echo view("user/lupa_password");
    }

    public function member_kursus()
    {
        $nama_lengkap = session()->get('nama_lengkap');
        $id_user = session()->get('id_user');
        $modul = $this->modulModel->findAll();

        // Mengambil materi dan progress untuk setiap modul
        $materi = [];
        $progress = [];
        foreach ($modul as $m) {
            $modul_id = $m['id_modul'];
            $materi[$modul_id] = $this->materiModel->where('id_modul', $modul_id)->findAll();

            // Menghitung total materi dalam modul
            $totalMateri = count($materi[$modul_id]);
            if ($totalMateri > 0) {
                // Menghitung jumlah materi yang sudah diselesaikan user dalam modul ini
                $completedMateri = $this->progressModel->where('id_modul', $modul_id)->where('id_user', $id_user)->countAllResults();

                // Menghitung persentase progress
                $progress[$modul_id] = ($completedMateri / $totalMateri) * 100;
            } else {
                $progress[$modul_id] = 0;
            }
        }

        $data = [
            'title' => 'Member Kursus',
            'nama_lengkap' => $nama_lengkap,
            'modul' => $modul,
            'materi' => $materi,
            'progress' => $progress,
        ];

        echo view("user/member_kursus", $data);
    }



    public function edit_profile()
    {
        $id_user = session()->get('id_user');
        $user = $this->authModel->where('id_user', $id_user)->first();;

        $data = [
            'title' => 'Edit Profile',
            'nama_lengkap' => $user['nama_lengkap'],
            'user' => $user
        ];
        echo view("user/edit_profile", $data);
    }

    public function save_profile()
    {
        $id_user = session()->get('id_user');
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
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !',

                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong !',

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
            $nama_lengkap =$this->request->getPost('nama_lengkap');
            $data = [
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'email' => $this->request->getPost('email'),
            ];
            $this->authModel->update($id_user, $data);
            session()->set('nama_lengkap', $nama_lengkap);
            session()->setFlashdata('message', 'Berhasil mengedit profile');
            return redirect()->to('/edit_profile');
        } else {
            // jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/edit_profile'))->withInput();
        }
    }

    public function video_kursus($segment1, $segment2 = null)
    {
        $nama_lengkap = session()->get('nama_lengkap');
        $id_user = session()->get('id_user');
    
        // Ambil semua materi dalam modul
        $materi = $this->materiModel->where('id_modul', $segment1)->findAll();
        
        // Ambil data video berdasarkan id materi atau id modul
        $video = ($segment2 !== null) 
            ? $this->materiModel->where('id_materi', $segment2)->first() 
            : $this->materiModel->where('id_modul', $segment1)->first();
    
        // Ambil data progress user
        $progress = $this->progressModel->where('id_modul', $segment1)->where('id_user', $id_user)->findAll();
        $completedMateriIds = array_column($progress, 'id_materi');
    
        // Gabungkan status penyelesaian ke data materi
        foreach ($materi as &$m) {
            $m['is_completed'] = in_array($m['id_materi'], $completedMateriIds);
        }
    
        $data = [
            'title' => 'Video Kursus',
            'nama_lengkap' => $nama_lengkap,
            'materi' => $materi,
            'video' => $video,
            'current_modul' => $segment1,
            'current_materi' => $segment2,
        ];
    
        echo view("user/video_kursus", $data);
    }
    
    public function save_progress()
    {
        $id_modul = $this->request->getVar('id_modul');
        $id_materi = $this->request->getVar('id_materi');
        $id_user = session()->get('id_user');
    
        $progressExists = $this->progressModel->where('id_modul', $id_modul)->where('id_user', $id_user)->where('id_materi', $id_materi)->first();
    
        if ($progressExists) {
            session()->setFlashdata('pesan', 'Progress sudah ada.');
        } else {
            $this->progressModel->save([
                'id_modul' => $id_modul,
                'id_materi' => $id_materi,
                'id_user' => $id_user,
            ]);
            session()->setFlashdata('pesan', 'Progress berhasil diupdate.');
        }
    
        return redirect()->to('video_kursus/' . $id_modul . '/' . $id_materi);
    }
    
    //admin
    public function data_user()
    {
        $data = [
            'title' => 'Data User',
            'menu' => 'data_user'

        ];
        echo view("admin/data_user", $data);
    }
    public function data_mitra()
    {
        $data = [
            'title' => 'Data Mitra',
            'menu' => 'data_mitra'

        ];
        echo view("admin/data_mitra", $data);
    }

    public function edit_mitra()
    {
        $data = [
            'title' => 'Edit Mitra',
            'menu' => 'data_mitra'

        ];
        echo view("admin/edit_mitra", $data);
    }

    public function tambah_mitra()
    {
        $data = [
            'title' => 'Tambah Mitra',
            'menu' => 'data_mitra'

        ];
        echo view("admin/tambah_mitra", $data);
    }


    public function data_pengajar()
    {
        $data = [
            'title' => 'Data Pengajar',
            'menu' => 'data_pengajar'

        ];
        echo view("admin/data_pengajar", $data);
    }

    public function edit_pengajar()
    {
        $data = [
            'title' => 'Edit Pengajar',
            'menu' => 'data_pengajar'

        ];
        echo view("admin/edit_mitra", $data);
    }

    public function tambah_pengajar()
    {
        $data = [
            'title' => 'Tambah Pengajar',
            'menu' => 'data_pengajar'

        ];
        echo view("admin/tambah_pengajar", $data);
    }



    public function contact()
    {
        $data['name'] = "Dynotama Parayu I";
        echo view("contact", $data);
    }


    public function faqs()
    {
        // membuat data untuk dikirim ke view
        $data['data_faqs'] = [
            [
                'question' => 'Apa itu Codeigniter?',
                'answer' => 'Codeigniter adalah framework untuk membuat web'
            ],
            [
                'question' => 'Siapa yang membuat Codeiginter?',
                'answer' => 'CI awalnya dibuat oleh Ellislab'
            ],
            [
                'question' => 'Codeigniter versi berapakah yang digunakan pada tutorial ini?',
                'answer' => 'Codeigniter versi 4.0.4'
            ]
        ];

        // load view dengan data
        echo view("faqs", $data);
    }
}
