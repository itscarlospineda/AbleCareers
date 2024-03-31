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
        Schema::create('notification_applicants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resume_id');
            $table->unsignedBigInteger('job_position_id');
            $table->foreign('resume_id')->references('id')->on('resume');
            $table->foreign('job_position_id')->references('id')->on('job_position');
            $table->string('estado');
            $table->string('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_applicants', function (Blueprint $table){
            $table->dropForeign(['resume_id']);
            $table->dropForeign(['jop_position_id']);
        });
      
    }
};
