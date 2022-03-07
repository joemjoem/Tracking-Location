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
    $currentPage = $this->request->getVar('page_userdata') ? $this->request->getVar('page_userdata') : 1;
    $data = [
      'user' => $this->usersModel->getOnlineUser(),
      'pager' => $this->usersModel->pager,
      'currentPage' => $currentPage
    ];

    // dd($data);
    echo view('page/dashboard', $data);
  }

  public function users()
  {
    $currentPage = $this->request->getVar('page_userdata') ? $this->request->getVar('page_userdata') : 1;
    $data = [
      'user' => $this->usersModel->paginate(5, 'userdata'),
      'pager' => $this->usersModel->pager,
      'offline' => $this->usersModel->countOfflineUser(),
      'online' => $this->usersModel->countOnlineUser(),
      'all' => $this->usersModel->countAllUser(),
      'currentPage' => $currentPage
    ];
    echo view('page/users', $data);
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

    // dd($this->request->getVar());
    $this->usersModel->save([
      'id' => $this->request->getVar('nomorid'),
      'nama' => $this->request->getvar('nama'),
      'jabatan' => $this->request->getVar('jabatan'),
      'status' => 'offline'
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

  public function coba()
  {
    $data = [
      'data' => $this->usersModel->getOfflineUser()
    ];
    dd($data);
  }
}
