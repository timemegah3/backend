<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContratanteService;
use App\Entities\Contratante;

class ContratanteController extends Controller
{
    private $service;
    
    public function __construct(ContratanteService $service)
    {
        $this->service = $service;
    }

    public function index(Request $requisicao)
    {
        return response()->json(Contratante::all(), 200);
    }

    public function store(Request $requisicao)
    {
        if($requisicao->isMethod('post'))
        {
            $dados = $requisicao->all();
            $retorno = $this->service->store($dados);

            if($retorno['success'] == true)
            {
                return response()->json([
                    'message' => $retorno['message'],
                    'success' => true,
                ], 201);
            }
            else
            {
                return response()->json([
                    'message' => $retorno['message'],
                    'success' => false,
                ], 400);
            }
            
        }
        else
        {
            return response()->json([
                'message' => 'Acao nao permitida',
                'success' => false,
            ], 401);
        }
        
    }

    public function update(Request $requisicao, $id)
    {
        $dados = $requisicao->all();
        $retorno = $this->service->update($dados, $id);

        if($retorno['success'] == true)
        {
            return response()->json([
                'message' => $retorno['message'],
                'success' => true,
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => $retorno['message'],
                'success' => false,
            ], 400);
        }
        
    }
}
