<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('id_pedido')->unique();
            $table->string('nome_rementente');
            $table->string('endereco_remetente'); // Fabricante/Fornecedor
            $table->string('cidade_remetente');
            $table->string('estado_remetente');
            $table->string('nome_destinatario');
            $table->string('endereco_destinatario');
            $table->string('cidade_destinatario');
            $table->string('estado_destinatario');
            $table->string('estado_remetente');
            $table->decimal('preco', 10, 2)->default(0.00);
            $table->integer('quantidade')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
