<?php

namespace App\Models;

use CodeIgniter\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    protected $allowedFields = ['nama_mitra','foto'];
}
