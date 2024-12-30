<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('konten', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('img')->nullable();
            $table->string('href')->nullable();
            $table->timestamps();

            // Menambahkan foreign key
            $table->foreignId('id_kategori')  // Nama kolom yang mengacu pada 'id_kategori'
                ->nullable()  // Kolom bisa NULL
                ->constrained('kategori')  // Menghubungkan dengan tabel 'kategori' dan kolom 'id'
                ->onDelete('set null')  // Set ke NULL jika data dihapus
                ->onUpdate('cascade');  // Perbarui nilai jika data diupdate
            // $table->foreignId('id_judul')  // Nama kolom yang mengacu pada 'id_kategori'
            //     ->nullable()  // Kolom bisa NULL
            //     ->constrained('judul')  // Menghubungkan dengan tabel 'kategori' dan kolom 'id'
            //     ->onDelete('set null')  // Set ke NULL jika data dihapus
            //     ->onUpdate('cascade');  // Perbarui nilai jika data diupdate
        });
    }

    public function down()
    {
        Schema::dropIfExists('konten');
    }
};
