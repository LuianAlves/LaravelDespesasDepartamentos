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
        Schema::create('sub_categoria_despesas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('categoria_despesa_id')->unsgined();
            $table->foreign('categoria_despesa_id')->references('id')->on('categoria_despesas')->onDelete('cascade');

            $table->string('sub_categoria_despesa', 75);

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
        Schema::dropIfExists('sub_categoria_despesas');
    }
};
