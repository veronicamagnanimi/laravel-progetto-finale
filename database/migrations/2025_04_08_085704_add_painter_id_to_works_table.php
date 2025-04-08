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
        Schema::table('works', function (Blueprint $table) {
            $table->dropColumn('painter');
            $table->foreignId('painter_id')->after('id') // colonna 'painter_id' come chiave esterna che punta alla tabella 'painters'
            ->constrained('painters') // definisce la chiave esterna
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropForeign(['painter_id']); // rimuove chiave esterna dalla tabella 'works'
            $table->dropColumn('painter_id'); // rimuove la colonna
            $table->string('painter')->after('id'); // ripristina la colonna come stringa 
        });
    }
};
