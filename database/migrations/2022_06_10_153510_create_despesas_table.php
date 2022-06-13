<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');

            $table->unsignedBigInteger('categoria_despesa_id')->unsigned();
            $table->foreign('categoria_despesa_id')->references('id')->on('categoria_despesas')->onDelete('cascade');            
            
            $table->unsignedBigInteger('sub_categoria_despesa_id')->unsigned();
            $table->foreign('sub_categoria_despesa_id')->references('id')->on('sub_categoria_despesas')->onDelete('cascade');            

            $table->unsignedBigInteger('metodo_pagamento_id')->unsigned();
            $table->foreign('metodo_pagamento_id')->references('id')->on('metodo_pagamentos')->onDelete('cascade');

            $table->string('forma_pagamento');
            $table->string('despesa', 75);
            $table->decimal('valor_despesa', 10,2);

            $table->text('descricao_despesa')->nullable();
            $table->string('data_despesa')->nullable();
            $table->string('dia_despesa')->nullable();
            $table->string('mes_despesa')->nullable();
            $table->string('ano_despesa')->nullable();

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
        Schema::dropIfExists('despesas');
    }
};
