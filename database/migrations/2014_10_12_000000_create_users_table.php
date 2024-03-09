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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('lastName')->default('caballero');
            $table->string('email')->unique();
            $table->string('phoneNumber')->default('33224850');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_active', 255)->default('ACTIVE');
            $table->string('userCreated')->nullable();
            $table->string('userModified')->nullable();
            $table->timestamps(); // Esto agregará created_at y updated_at como timestamps
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
