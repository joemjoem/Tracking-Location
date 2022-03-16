<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Myth\Auth\Models\LoginModel;
use Config\Validation;


class Page extends BaseController
{
  protected $usersModel;
  protected $loginModel;
  public function __construct()
  {
    $this->usersModel = new UsersModel();
    $this->loginModel = new LoginModel();
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
      'admin' => $this->loginModel->countAllAdmin(),
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

  public function detailUser($slug, $lokasi = null)
  {

    $data = [
      'title' => 'Detail User',
      'detail' => $this->usersModel->getDetail($slug),
      'back' => $lokasi
    ];
    // dd($data);
    return view('page/detailUsers', $data);
  }

  public function getDataUsers()
  {
    echo json_encode($this->usersModel->findAll());
  }

  public function save()
  {

    if (!$this->validate([
      'nomorid' => [
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

    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $this->request->getVar('nama'));
    $this->usersModel->save([
      'id' => $this->request->getVar('nomorid'),
      'nama' => $this->request->getvar('nama'),
      'slug' => $slug,
      'jabatan' => $this->request->getVar('jabatan'),
      'status' => 'offline'
    ]);

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
  // realtime

  public function statusUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["status"]);
  }

  public function namaUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["nama"]);
  }

  public function jabatanUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["jabatan"]);
  }

  public function bateraiUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["baterai"]);
  }

  public function logUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["log"]);
  }

  public function latUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["lat"]);
  }

  public function realAdrressUser($slug)
  {
    $data = $this->usersModel->realtimeStatus($slug);
    // dd($data["status"]);
    echo ($data["real_address"]);
  }

  public function coba($nama, $lokasi = null)
  {
    // $this->statusUser($nama);
    $data = [
      'title' => 'Detail User',
      'detail' => $this->usersModel->getDetail($nama),
      'back' => $lokasi
    ];
    return view('page/coba', $data);
  }
}
