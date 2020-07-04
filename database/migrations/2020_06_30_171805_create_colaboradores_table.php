<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('profissao');
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('senha');
            $table->string('foto_perfil')->nullable(); #PATH
            $table->char('cep', 9)->nullable();
            $table->char('celular', 11);
            $table->string('apresentacao')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaboradores');
    }
}
