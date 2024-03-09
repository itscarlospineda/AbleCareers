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
            $table->id('id');
            $table->string('name', 50);
            $table->string('lastName', 50);
            $table->string('email')->unique();
            $table->string('phoneNumber')->default('0000-0000');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_active', 25)->default('ACTIVE');
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
