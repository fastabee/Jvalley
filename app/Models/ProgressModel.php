<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgressModel extends Model
{
    protected $table = 'progress';
    protected $primaryKey = 'id_progress';
    protected $allowedFields = ['id_modul','id_materi','id_user'];
}
