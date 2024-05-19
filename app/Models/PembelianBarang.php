<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'pembelian_barang';

    protected $fillable = [
        'id_pembelian',
        'kode_barang',
        'nama_barang',
        'harga',
    ];
}
