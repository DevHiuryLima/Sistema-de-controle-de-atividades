<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Model\Administrador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if(session()->exists('idAdmin')) {
            return redirect()->to('sistema/home');
        } else {
            return view('Admin.index');
        }
    }

    public function fazerLogin(Request $request)
    {
        $admin = DB::table('administradores')->where([
            ['login', '=', $request->login],
            ['senha', '=', base64_encode($request->senha)],
        ])->get();
        
        if (!$admin->count()){
            $admin = null;
            echo "<script>window.alert('E-mail ou senha inválidos!')</script>";
            echo "<script language='javaScript'>window.setTimeout('history.back(-1)', 02);</script> ";
        } else {
            session()->put('idAdmin',$admin->get(0)->idAdmin);
           return redirect()->to('sistema/home');
        }

    }
}
