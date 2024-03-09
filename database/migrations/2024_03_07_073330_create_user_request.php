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
        Schema::create('user_request', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');


            $table->string('request_info');
            $table->string('request_status');
            $table->string('is_active', 255)->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**ph
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::table('user_request', function (Blueprint $table) {
        // Eliminar la clave externa antes de eliminar la tabla
        $table->dropForeign(['user_id']);
    });
    

        Schema::dropIfExists('user_request');
    }
};
