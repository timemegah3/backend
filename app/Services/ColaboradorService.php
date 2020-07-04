<?php 
namespace App\Services;

use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Entities\Colaborador;

class ColaboradorService
{
    public function store(array $dados)
    {
        try {
            $sup = new Colaborador;
            $sup->fill($dados);
            $sup->save();

            return [
                'success' => true,
                'message' => 'Conta criada com sucesso',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }

    public function update(array $dados, int $id)
    {
        try {
            $sup = Colaborador::find($id);
            $sup->fill($dados);
            $sup->save();

            return [
                'success' => true,
                'message' => 'Conta atualizada com sucesso',
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}