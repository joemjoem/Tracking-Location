<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Validation;

class Data extends BaseController
{
  protected $usersModel;
  public function __construct()
  {
    $this->usersModel = new UsersModel();
  }

  public function index()
  {
    $data = [
      'no_alat' => $this->request->getVar('no_alat'),
      'baterai' => $this->request->getVar('baterai'),
      'log' => $this->request->getVar('log'),
      'lat' => $this->request->getVar('lat')
    ];

    // dd($data['nama']);

    return view('prosesData/prosesData', $data);
  }

  public function delete($id)
  {
    // dd($id);
    $this->usersModel->delete($id);
    return redirect()->to('/page');
  }

  public function update()
  {
    $id = $this->request->getVar('id');
    $data = array(
      'nama' => $this->request->getVar('nama'),
      'id' => $this->request->getVar('id'),
      'jabatan' => $this->request->getVar('jabatan')
    );
    $this->usersModel->update($id, $data);
    return redirect()->to('/page');
  }

  public function inputDataArduino()
  {
    $noAlat = $this->request->getVar('no_alat');
    $data = array(
      'baterai' => $this->request->getVar('baterai'),
      'log' => $this->request->getVar('log'),
      'lat' => $this->request->getVar('lat')
    );
    $this->usersModel->update($noAlat, $data);
  }
}
