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
        Schema::create('orcamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->decimal('kwp', 8, 2);
            $table->string('orientacao');
            $table->string('instalacao');
            $table->decimal('preco', 10, 2);
            $table->string('arquivo')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orcamentos', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remove a chave estrangeira antes de dropar a coluna
            $table->dropColumn('user_id');
            $table->dropColumn('arquivo');
        });

        Schema::dropIfExists('orcamentos');
    }
};
