<?php

namespace App\Http\Controllers\Admin;

use App\Model\Administrador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(session()->exists('idAdmin')) {
            $admin = Administrador::find(session()->get('idAdmin'));
            return view('Admin.home', compact('admin'));
        } else {
            return redirect()->to('/');
        }
    }

    public function sair()
    {
        session()->remove('idAdmin');
        return redirect()->to('/');
    }
}
