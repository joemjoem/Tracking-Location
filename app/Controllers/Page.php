<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Validation;

class Page extends BaseController
{
  protected $usersModel;
  public function __construct()
  {
    $this->usersModel = new UsersModel();
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

  public function detailUser($nama)
  {
    $data = [
      'title' => 'detail User',
      'detail' => $this->usersModel->getDetail($nama)
    ];
    return view('page/detailUsers', $data);
  }

  public function getDataUsers()
  {
    echo json_encode($this->usersModel->findAll());
  }

  public function save()
  {
    $coba = 0.0;
    // dd($this->request->getVar());
    $this->usersModel->save([
      'id' => $this->request->getVar('nomorid'),
      'nama' => $this->request->getvar('nama'),
      'jabatan' => $this->request->getVar('jabatan'),
    ]);

    return redirect()->to('page/addUsers');
  }

  public function edit($nama)
  {
    $data = [
      'detail' => $this->usersModel->getDetail($nama)
    ];
    // dd($data);
    return view('/page/editUser', $data);
  }
}
