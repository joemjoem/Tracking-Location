<?php

namespace App\Controllers;

class Page extends BaseController
{
  public function index()
  {
    echo view('page/dashboard');
  }
}
