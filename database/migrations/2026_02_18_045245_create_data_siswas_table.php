<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('foto')->nullable();
            $table->string('nisn')->nullable()->unique();
            $table->string('nik')->nullable()->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kelas')->nullable();
            $table->string('status')->nullable();
            $table->string('jk')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('jenjang')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
