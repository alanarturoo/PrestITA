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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->double('capital');
            $table->integer('porcentaje');
            $table->integer('nMeses');
            $table->integer('corte');
            $table->boolean('deuda')->nullable();
            $table->double('total')->nullable();
            $table->double('pagado')->nullable();
            $table->double('restante')->nullable();
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
        Schema::dropIfExists('prestamos');
    }
};
