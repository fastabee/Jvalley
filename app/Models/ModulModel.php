<?php

namespace App\Models;

use CodeIgniter\Model;

class ModulModel extends Model
{
    protected $table = 'modul';
    protected $primaryKey = 'id_modul';
    protected $allowedFields = ['nama_modul', 'foto'];
    public function getMateriWithModul()
    {
        // Query untuk mengambil data dengan join
        $query = $this->db->table('modul')
            ->select('id_materi, nama_modul, judul_materi')
            ->join('materi', 'modul.id_modul = materi.id_modul')
            ->get();

        return $query->getResult();
    }
    public function search($keyword)
    {
        // Query untuk mengambil data materi dengan modul
        $query = $this->db->table('modul')
            ->select('materi.id_materi, modul.nama_modul, materi.judul_materi')
            ->join('materi', 'modul.id_modul = materi.id_modul')
            ->groupStart()
            ->like('modul.nama_modul', $keyword)
            ->orLike('materi.judul_materi', $keyword)
            ->groupEnd()
            ->get();

        return $query->getResult();
    }
}
