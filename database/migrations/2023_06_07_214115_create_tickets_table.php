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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedDecimal('employee_ci', $precision = 8, $scale = 0);
            $table->foreign('employee_ci')->references('ci')->on('employees')->onDelete('cascade');
            $table->string('mes_año');
            $table->date('fecha');
            $table->float('nombre');
            $table->float('salario');
            $table->float('aguinaldo');
            $table->float('desc');
            $table->float('bonos');
            $table->timestamps();
        });

        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
