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
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilih');
            $table->string('no_kta');
            $table->enum('jk',['L','P']);
            $table->enum('section',['Brassline', 'Battery', 'Color Guard', 'Pit Instrument']);
            $table->integer('jabatan_id');
            $table->enum('status',['Y','N'])->default('Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihs');
    }
};
