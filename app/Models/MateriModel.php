<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    protected $allowedFields = ['id_modul', 'judul_materi', 'link_youtube'];

    
}
