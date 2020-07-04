<?php

use Illuminate\Database\Seeder;
use App\Entities\Contratante;
use App\Entities\Colaborador;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        Contratante::create([
            'nome' => 'teste',
            'cpf-cnpj' => '123123',
            'apresentacao' => 'bigrafia',
            'email' => 'email@email',
            'senha' => '123',
            'celular' => '1231231'
        ]);

        Colaborador::create([
            'nome' => 'teste',
            'profissao' => 'pedreiro',
            'apresentacao' => 'bigrafia',
            'email' => 'email@email',
            'senha' => '123',
            'celular' => '1231231'
        ]);
    }
}
