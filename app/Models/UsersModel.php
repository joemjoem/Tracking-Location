<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table = 'userdata';
  protected $useTimestamps = true;
  protected $useAutoIncrement = false;
  // protected $allowedFields = ['nama', 'no_alat', 'jabatan', 'baterai', 'log', 'lat'];
  protected $allowedFields = ['id', 'nama', 'slug', 'jabatan', 'baterai', 'status', 'log', 'lat', 'real_address'];

  public function getDetail($slug)
  {
    // dd($this->where(['nama' => $nama])->first());
    return $this->where(['slug' => $slug])->first();
  }

  public function getOnlineUser($search)
  {
    // return $this->where(['status' => "online"])->paginate(5, 'userdata');
    if ($search != null) {
      return $this->where(['status' => "online"])->like('nama', $search)->paginate(5, 'userdata');
    } else {
      return $this->where(['status' => "online"])->paginate(5, 'userdata');
    }
  }

  public function countOfflineUser()
  {
    return $this->where(['status' => "offline"])->countAllResults();
  }

  public function countOnlineUser()
  {
    return $this->where(['status' => "online"])->countAllResults();
  }

  public function countAllUser()
  {
    return $this->countAllResults();
  }

  public function search($keyword)
  {
    return $this->table('userdata')->like('nama', $keyword);
  }


  // realttime
  public function realtimeStatus($slug)
  {
    return $this->where(['slug' => $slug])->first();
  }
}
