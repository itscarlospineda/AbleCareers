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
        Schema::create('job__positions', function (Blueprint $table) {
            $table->bigIncrements('jobpo_id');
            $table->string('jobpo_name');
            $table->text('jobpo_desc');
            $table->string('jobpo_date');
            $table->string('jobpo_state',30);
            $table->unsignedBigInteger('comp_id');
            $table->foreign('comp_id')->references('id')->on('company'); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job__positions');
    }
};
