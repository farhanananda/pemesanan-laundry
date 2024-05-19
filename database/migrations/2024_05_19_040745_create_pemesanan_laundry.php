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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('id_pegawai');
            $table->string('nama_pegawai', 150);
            $table->string('alamat', 255);
            $table->string('no_hp', 15);
            $table->string('jabatan', 20);
            $table->timestamps();
        });
        Schema::create('pembelian_barang', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->string('kode_barang', 10)->unique();
            $table->string('nama_barang', 150);
            $table->integer('harga');
            $table->timestamps();
        });
        Schema::create('data_laundry_non_members', function (Blueprint $table) {
            $table->id('no_transaksi');
            $table->date('tgl_transaksi');
            $table->string('nama_customer', 150);
            $table->string('alamat', 255);
            $table->string('no_hp', 15);
            $table->string('keterangan', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_laundry');
    }
};
