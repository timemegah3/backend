<?php 
namespace App\Services;

use Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Entities\Contratante;

class ContratanteService
{
    public function store(array $dados)
    {
        try {
            $sup = new Contratante;
            $sup->fill($dados);

            // 
            // AINDA NAO TA DANDO A FOTOOO
            // 
            if(isset($dados['foto_perfil']))
            {
                //Storing user photo
                $filename = Str::random(40).'.png';
                if(Storage::disk('public')->put('images/'.$sup->nome.'/'.$filename, file_get_contents($dados->foto_perfil)))
                {
                    $sup->foto_perfil = Storage::url('images/'.$sup->nome.'/'.$filename);
                }
                else
                {
                    $sup->foto_perfil = '';
                }
            }
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
            $sup = Contratante::find($id);
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