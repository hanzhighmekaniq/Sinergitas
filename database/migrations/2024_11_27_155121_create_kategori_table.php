<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
            // Menambahkan foreign key
            $table->foreignId('id_judul')
                ->nullable() // Kolom bisa NULL
                ->constrained('judul') // Secara otomatis mengacu ke 'id' kolom di tabel 'judul'
                ->onDelete('set null') // Set ke NULL jika data dihapus
                ->onUpdate('cascade'); // Perbarui nilai jika data diupdate
        });
    }

    public function down()
    {
        Schema::dropIfExists('kategori');
    }
};
