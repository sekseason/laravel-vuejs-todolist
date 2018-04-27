<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NttDataController extends Controller
{
  public function __construct()
  {
      $this->middleware(['auth', 'role:admin']);
  }

  public function index()
  {
      return view('test.index');
  }
}
