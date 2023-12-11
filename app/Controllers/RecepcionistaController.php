<?php


namespace app\Controllers;

use CodeIgniter\Controller;

class RecepcionistaController extends Controller
{
    public function index()
    {
        return view('dashboard/recep');
    }
}
