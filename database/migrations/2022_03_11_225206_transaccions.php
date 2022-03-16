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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cuenta');
            $table->unsignedBigInteger('id_categoria');

            $table->float('monto');
            $table->date('fecha');
            $table->string('tipo_transaccion');
            $table->string('nota')->nullable();
            $table->foreign('id_cuenta')->references("id_cuenta")->on('cuentabancos')->onDelete('cascade');
            $table->foreign('id_categoria')->references("id_categoria")->on('categoria');
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
        Schema::dropIfExists('transacciones');
    }
};