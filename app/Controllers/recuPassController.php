<?php


namespace app\Controllers;

use CodeIgniter\Controller;

class recupassController extends Controller
{
    public function index()
    {
        return view('modulos/recuperarPass');
    }
}
