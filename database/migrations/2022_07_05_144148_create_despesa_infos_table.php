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
        Schema::create('despesa_infos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('despesa_id')->unsigned();
            $table->foreign('despesa_id')->references('id')->on('despesas')->onDelete('cascade');

            $table->string('categoria_despesa_id');
            $table->string('categoria_despesa');
            $table->string('departamento_id');
            $table->string('departamento');
            $table->string('tipo_gasto');
            $table->decimal('valor_despesa', 10, 2);

            $table->string('check_data_despesa')->nullable();

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
        Schema::dropIfExists('despesa_infos');
    }
};
