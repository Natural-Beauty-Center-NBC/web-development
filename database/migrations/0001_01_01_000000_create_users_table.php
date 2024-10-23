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
            $table->id();
            $table->string('nama')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('alamat')->nullable(false);
            $table->char('no_telp', 20)->nullable(false);
            $table->enum('status', ['Available', 'Busy'])->nullable(false);
            $table->string('password')->nullable(false);
            $table->unsignedBigInteger('role_id')->nullable(false);
            $table->rememberToken();
            $table->timestamps();

            // Relations
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
