<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Validation;

class Page extends BaseController
{
  protected $userModel;
  public function __construct()
  {
    $this->userModel = new UsersModel();
  }

  public function index()
  {
    echo view('page/dashboard');
  }

  public function users()
  {
    echo view('page/users');
  }

  public function addUsers()
  {
    echo view('page/addUsers');
  }

  public function detailUser()
  {
    echo view('page/detailUsers');
  }

  public function getDataUsers()
  {
    echo json_encode($this->userModel->findAll());
  }
}
