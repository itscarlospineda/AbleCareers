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
        Schema::create('resume', function (Blueprint $table) {
            $table->id();
            $table->text('info');

            $table->string('education', 255);
            $table->string('education_pos', 255)->nullable();
            $table->string('education_years', 255)->nullable();

            $table->string('education_two', 255)->nullable();
            $table->string('education_two_pos', 255)->nullable();
            $table->string('education_two_years', 255)->nullable();

            $table->string('work_experience', 255);
            $table->string('work_pos', 255)->nullable();
            $table->string('work_years', 255)->nullable();

            $table->string('work_two_experience', 255)->nullable();
            $table->string('work_two_pos', 255)->nullable();
            $table->string('work_two_years', 255)->nullable();

            $table->string('extra', 255);
            $table->string('reference', 255);
            $table->string('reference_num', 255)->nullable();
            $table->string('reference_two', 255)->nullable();
            $table->string('reference_two_num', 255)->nullable();

            $table->string('photo', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('is_active', 25)->default('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume');
    }
};
