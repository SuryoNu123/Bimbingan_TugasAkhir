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
         Schema::create('dosens', function (Blueprint $table) {
        $table->id();

        $table->string('nip')->unique();          // NIP dosen
        $table->string('nama');                   // nama dosen
        $table->string('bidang_keahlian');        // bidang keahlian
        $table->string('no_hp');                  // nomor HP
        $table->string('email')->unique();        // email

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
