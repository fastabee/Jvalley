<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table = 'pengajar';
    protected $primaryKey = 'id_pengajar';
    protected $allowedFields = ['nama_pengajar','foto'];
}
