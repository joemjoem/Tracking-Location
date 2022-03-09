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
    if (!$this->validate([
      'nomorid' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus ditambahkan'
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus ditambahkan'
        ]
      ],
      'jabatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} harus ditambahkan'
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      $string_error = "/page/edit/" . $this->request->getVar('keyword_name');
      return redirect()->to($string_error)->withInput()->with('validation', $validation);
    }

    $id = $this->request->getVar('id');
    $data = array(
      'nama' => $this->request->getVar('nama'),
      'id' => $this->request->getVar('nomorid'),
      'jabatan' => $this->request->getVar('jabatan')
    );
    $this->usersModel->update($id, $data);
    session()->setFlashdata('update', 'data Berhsail ditambahkan');
    $string_success = '/page/detailUser/' . $this->request->getVar('nama');
    return redirect()->to($string_success);
  }

  public function inputDataArduino()
  {
    $noAlat = $this->request->getVar('no_alat');
    $data = array(
      'baterai' => $this->request->getVar('baterai'),
      'log' => $this->request->getVar('log'),
      'lat' => $this->request->getVar('lat'),
      'real_address' => $this->request->getVar('real'),
      'status' => $this->request->getVar('status')
    );

    dd($data);
    $this->usersModel->update($noAlat, $data);
  }
}
