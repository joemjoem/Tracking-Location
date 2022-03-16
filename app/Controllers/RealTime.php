<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Validation;

class RealTime extends BaseController
{
  protected $usersModel;
  public function __construct()
  {
    $this->usersModel = new UsersModel();
  }
  public function statusUser($nama)
  {

    echo json_encode($this->usersModel->realtimeStatus($nama));
  }
}
