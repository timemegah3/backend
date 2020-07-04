<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Colaborador;
use App\Services\ColaboradorService;

class ColaboradorController extends Controller
{
    private $service;
    
    public function __construct(ColaboradorService $service)
    {
        $this->service = $service;
    }

    public function index(Request $requisicao)
    {
        return response()->json(Colaborador::all(), 200);
    }

    public function store(Request $requisicao)
    {
        $dados = $requisicao->all();
        $retorno = $this->service->store($dados);

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
