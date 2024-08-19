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
        Schema::create('usuario_admins', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 244);
            $table->string('cargo', 100);
            $table->string('permissoes', 244);
            $table->string('escola', 244);
            $table->unsignedBigInteger('id_escola');
            $table->string('user_name', 244);
            $table->string('senha', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_admins');
    }
};
