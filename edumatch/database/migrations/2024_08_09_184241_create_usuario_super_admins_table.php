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
        Schema::create('usuario_super_admins', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cnpj', 100);
            $table->string('email', 244);
            $table->string('site', 244);
            $table->string('localizacao', 244);
            $table->unsignedBigInteger('qtd_usuarios');
            $table->unsignedBigInteger('qtd_usuarios_admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_super_admins');
    }
};
