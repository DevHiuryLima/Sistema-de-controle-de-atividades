<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Model\Administrador;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministradoresController extends Controller
{
    public function index()
    {
        if(session()->exists('idAdmin')) {
            $administradores = Administrador::all();

            if (!$administradores->count()) { $administradores = null; }

            return view('Admin.administradores', compact('administradores'));
        } else {
            return redirect()->to('/');
        }
    }

    public function redirecionaCadastro(Request $request)
    {
        if(session()->exists('idAdmin')) {
            return view('Admin.cadastro-administrador');
        } else {
            return redirect()->to('/');
        }
    }

    public function fazerCadastroAdministrador(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $administradores = DB::table('administradores')->where([
                ['login', '=', $request->login],
                ['senha', '=', base64_encode($request->senha)],
            ])->get();
    
            if (!$administradores->count()){
                try {
                    $administrador = new Administrador();

                    $administrador->nome = $request->nome;
                    $administrador->login = $request->login;
                    $administrador->senha = base64_encode($request->senha);
                    $status = $administrador->save();

                    if($status == true){
                        return response()->json($administrador, 200);
                    }else {
                        $administrador->delete();
                        return response()->json([
                            'message'   => 'Ocorreu um erro no cadastro!',
                        ], 422);
                    }
                } catch (\Throwable $th) {
                    return response()->json([
                        'message'   => $th->getMessage(),
                    ], 422);
                }
            } else {
                return response()->json([
                    'message'   => 'Esse Administrador já está cadastrado!',
                ], 422);
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function redirecionaAlterar(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $administrador = Administrador::find($request->idAdmin); 
            return view('Admin.alterar-administrador', compact('administrador'));
        } else {
            return redirect()->to('/');
        }
    }

    public function fazerAlteracaoAdministrador(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $administrador = Administrador::find($request->idAdmin);

            if ($administrador != null){

                $administradores = DB::table('administradores')->where([
                    ['login', '=', $request->login],
                    ['senha', '=', base64_encode($request->senha)],
                    ['idAdmin', '!=', $request->idAdmin],
                ])->get();

                if (!$administradores->count()){
                    try {
                        $administrador->nome = $request->nome;
                        $administrador->login = $request->login;
                        $administrador->senha = base64_encode($request->senha);
                        $status = $administrador->save();

                        if($status == true){
                            return response()->json($administrador, 200);
                        }else {
                            $administrador->delete();
                            return response()->json([
                                'message'   => 'Ocorreu um erro no cadastro!',
                            ], 422);
                        }
                    } catch (\Throwable $th) {
                        return response()->json([
                            'message'   => $th->getMessage(),
                        ], 422);
                    }
                } else {
                    return response()->json([
                        'message'   => 'Esse Administrador já está cadastrado!',
                    ], 422);
                }
            } else {
                return response()->json([
                    'message'   => 'Administrador não encontrado!',
                ], 404);
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function removerCadastro(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $administrador = Administrador::find($request->idAdmin);

            if ($administrador != null){
                $status = $administrador->delete();
    
                if($status == true){
                    echo "Removido com sucesso!";
                }else {
                    echo "Ocorreu um erro, tente novamente!";
                }
            } else {
                echo "Ocorreu um erro, tente novamente!";
            }
        } else {
            return redirect()->to('/');
        }
    }
}
