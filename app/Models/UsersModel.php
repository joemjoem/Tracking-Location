<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'user';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'no_alat', 'jabatan', 'baterai', 'log', 'lat'];
}
