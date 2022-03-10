<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Page extends BaseController
{
  protected $usersModel;
  public function __construct()
  {
    $this->usersModel = new UsersModel();
  }

  public function index()
  {
    // get keyword
    $keyword = $this->request->getVar('nama');

    if ($keyword) {
      $search = $keyword;
    } else {
      $search = null;
    }
    $currentPage = $this->request->getVar('page_userdata') ? $this->request->getVar('page_userdata') : 1;
    $data = [
      'title' => 'Dashboard',
      'search_destination' => 'index',
      'user' => $this->usersModel->getOnlineUser($search),
      'pager' => $this->usersModel->pager,
      'currentPage' => $currentPage
    ];

    echo view('page/dashboard', $data);
  }

  public function users()
  {
    $keyword = $this->request->getVar('nama');
    if ($keyword) {
      $search = $this->usersModel->search($keyword);
    } else {
      $search = $this->usersModel;
    }

    $currentPage = $this->request->getVar('page_userdata') ? $this->request->getVar('page_userdata') : 1;
    $data = [
      'title' => 'Users',
      'search_destination' => 'users',
      'user' => $search->paginate(5, 'userdata'),
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
    $data = [
      'title' => 'Tambah User',
      'validation' => \Config\Services::validation()
    ];
    echo view('page/addUsers', $data);
  }

  public function detailUser($nama, $lokasi = null)
  {
    $data = [
      'title' => 'Detail User',
      'detail' => $this->usersModel->getDetail($nama),
      'back' => $lokasi
    ];
    return view('page/detailUsers', $data);
  }

  public function getDataUsers()
  {
    echo json_encode($this->usersModel->findAll());
  }

  public function save()
  {
    if (!$this->validate([
      'id' => [
        'rules' => 'required|is_unique[userdata.id]',
        'errors' => [
          'required' => '{field} harus ditambahkan',
          'is_unique' => '{field} sudah terdaftar'
        ]
      ],
      'nama' => [
        'rules' => 'required|is_unique[userdata.nama]',
        'errors' => [
          'required' => '{field} harus ditambahkan',
          'is_unique' => '{field} sudah terdaftar'
        ]
      ],
      'jabatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus ditambahkan'
        ]
      ]
    ])) {
      return redirect()->to('/page/addUsers')->withInput();
    }

    //dd($this->request->getVar());
    $this->usersModel->save(
      [
        'id' => $this->request->getVar('id'),
        'nama' => $this->request->getvar('nama'),
        'jabatan' => $this->request->getVar('jabatan')
      ]
    );

    session()->setFlashdata('pesan', 'data Berhsail ditambahkan');
    return redirect()->to('/users');
  }

  public function edit($nama)
  {
    $data = [
      'title' => 'Edit User',
      'detail' => $this->usersModel->getDetail($nama),
      'validation' => \Config\Services::validation()
    ];
    // dd($data);
    return view('/page/editUser', $data);
  }
}
