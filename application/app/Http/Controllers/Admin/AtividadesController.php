<?php

namespace App\Http\Controllers\Admin;

use App\Model\Atividade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{
    public function index()
    {
        if(session()->exists('idAdmin')) {
            $atividades = Atividade::all();

            if (!$atividades->count()) { $atividades = null; }

            return view('Admin.atividades', compact('atividades'));
        } else {
            return redirect()->to('/');
        }
    }

    public function redirecionaCadastro(Request $request)
    {
        if(session()->exists('idAdmin')) {
            return view('Admin.cadastro-atividade');
        } else {
            return redirect()->to('/');
        }
    }

    public function fazerCadastroAtividade(Request $request)
    {
        if(session()->exists('idAdmin')) {
            try {
                $numeroDiaSemana = date('w', time());
                $horarioFixo = strtotime("01:00:00 pm");
                $horarioAtual = strtotime("now");

                if ($numeroDiaSemana == 0 || $numeroDiaSemana == 5 || $numeroDiaSemana == 6) {

                    if (($horarioAtual > $horarioFixo) && $request->tipoAtividade == "manutencaoUrgente") {
                        return response()->json([
                            'message'   => 'Passou do horário para manutenções urgente!',
                        ], 422);
                    } else {
                        $atividade = new Atividade();

                        $atividade->tipoAtividade = $request->tipoAtividade;
                        $atividade->titulo = $request->titulo;
                        $atividade->descricao = $request->descricao;
                        $atividade->status = "aberta";
                        $status = $atividade->save();
        
                        if($status == true){
                            return response()->json($atividade, 200);
                        }else {
                            $atividade->delete();
                            return response()->json([
                                'message'   => 'Ocorreu um erro no cadastro!',
                            ], 422);
                        }
                    }

                } else {
                    $atividade = new Atividade();

                    $atividade->tipoAtividade = $request->tipoAtividade;
                    $atividade->titulo = $request->titulo;
                    $atividade->descricao = $request->descricao;
                    $atividade->status = "aberta";
                    $status = $atividade->save();
    
                    if($status == true){
                        return response()->json($atividade, 200);
                    }else {
                        $atividade->delete();
                        return response()->json([
                            'message'   => 'Ocorreu um erro no cadastro!',
                        ], 422);
                    }
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'message'   => $th->getMessage(),
                ], 422);
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function redirecionaAlterar(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $atividade = Atividade::find($request->idAtividade); 
            return view('Admin.alterar-atividade', compact('atividade'));
        } else {
            return redirect()->to('/');
        }
    }

    public function fazerAlteracaoAtividade(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $atividade = Atividade::find($request->idAtividade);

            if ($atividade != null){
                try {
                    $numeroDiaSemana = date('w', time());
                    $horarioFixo = strtotime("01:00:00 pm");
                    $horarioAtual = strtotime("now");
    
                    if ($numeroDiaSemana == 0 || $numeroDiaSemana == 5 || $numeroDiaSemana == 6) {
    
                        if (($horarioAtual > $horarioFixo) && $request->tipoAtividade == "manutencaoUrgente") {
                            return response()->json([
                                'message'   => 'Passou do horário para manutenções urgente!',
                            ], 422);
                        } else {
    
                            $atividade->tipoAtividade = $request->tipoAtividade;
                            $atividade->titulo = $request->titulo;
                            $atividade->descricao = $request->descricao;
                            $status = $atividade->save();
            
                            if($status == true){
                                return response()->json($atividade, 200);
                            }else {
                                return response()->json([
                                    'message'   => 'Ocorreu um erro no cadastro!',
                                ], 422);
                            }
                        }
    
                    } else {
    
                        $atividade->tipoAtividade = $request->tipoAtividade;
                        $atividade->titulo = $request->titulo;
                        $atividade->descricao = $request->descricao;
                        $status = $atividade->save();
        
                        if($status == true){
                            return response()->json($atividade, 200);
                        }else {
                            return response()->json([
                                'message'   => 'Ocorreu um erro no cadastro!',
                            ], 422);
                        }
                    }
                } catch (\Throwable $th) {
                    return response()->json([
                        'message'   => $th->getMessage(),
                    ], 422);
                }
            } else {
                return response()->json([
                    'message'   => 'Atividade não encontrada!',
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
    
    public function atividadesAberta()
    {
        if(session()->exists('idAdmin')) {
            $atividades = Atividade::where('status', '=', 'aberta')->get();
            
            if (!$atividades->count()) { $atividades = null; }

            return view('Admin.atividades-aberta', compact('atividades'));
        } else {
            return redirect()->to('/');
        }
    }

    public function concluirAtividade(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $atividade = Atividade::find($request->idAtividade);
    
            if ($atividade != null){
                $atividade->status = "concluida";
                $status = $atividade->save();
    
                if($status == true){
                    echo "Concluida com sucesso!";
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

    public function finalizarAtividade(Request $request)
    {
        if(session()->exists('idAdmin')) {
            $atividade = Atividade::find($request->idAtividade);
    
            if ($atividade != null){
                $atividade->status = "finalizada";
                $status = $atividade->save();
    
                if($status == true){
                    echo "Finalizada com sucesso!";
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

    public function atividadesConcluida()
    {
        if(session()->exists('idAdmin')) {
            $atividades = Atividade::where('status', '=', 'concluida')->get();
            
            if (!$atividades->count()) { $atividades = null; }

            return view('Admin.atividades-concluida', compact('atividades'));
        } else {
            return redirect()->to('/');
        }
    }

    public function atividadesFinalizada()
    {
        if(session()->exists('idAdmin')) {
            $atividades = Atividade::where('status', '=', 'finalizada')->get();
            
            if (!$atividades->count()) { $atividades = null; }

            return view('Admin.atividades-finalizada', compact('atividades'));
        } else {
            return redirect()->to('/');
        }
    }
}
