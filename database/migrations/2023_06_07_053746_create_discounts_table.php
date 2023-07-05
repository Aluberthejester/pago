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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); 
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->float('salario_base');
            $table->float('desc_salud');
            $table->float('desc_jubi');
            $table->float('desc_fns');
            $table->float('desc_fpc');
            $table->float('neto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
