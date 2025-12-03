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
        Schema::table('consultas', function (Blueprint $table) {
            $table->enum('status', ['espera', 'em_atendimento', 'finalizado'])->default('espera')->after('observacoes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
