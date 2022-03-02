<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  // protected $table = 'user';
  protected $table = 'userData';
  protected $useTimestamps = true;
  // protected $allowedFields = ['nama', 'no_alat', 'jabatan', 'baterai', 'log', 'lat'];
  protected $allowedFields = ['id', 'nama', 'jabatan', 'baterai', 'status', 'log', 'lat'];

  public function getDetail($nama)
  {
    // dd($this->where(['nama' => $nama])->first());
    return $this->where(['nama' => $nama])->first();
  }
}
