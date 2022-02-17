<?php

namespace App\Controllers;

class Page extends BaseController
{
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
}
