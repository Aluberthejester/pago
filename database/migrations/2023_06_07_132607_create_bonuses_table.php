<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('employee_ci', $precision = 8, $scale = 0);
            $table->foreign('employee_ci')->references('ci')->on('employees')->onDelete('cascade');
            $table->enum('templeado', ['planta', 'contrato']);
            $table->integer('meses');
            $table->float('bol1');
            $table->float('bol2');
            $table->float('bol3');
            $table->float('salario');
            $table->float('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bonuses');
    }
};
