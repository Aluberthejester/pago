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
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedDecimal('ci', $precision = 8, $scale = 0)->primary();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->string('nomb');
            $table->string('apell');
            $table->date('fechanac');
            $table->integer('tel');
            $table->enum('temple', ['planta', 'contrato']);
            $table->unsignedBigInteger('post_id'); 
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->string('dir');
            $table->date('tcontrato')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
