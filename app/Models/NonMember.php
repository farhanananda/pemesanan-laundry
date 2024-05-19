<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonMember extends Model
{
    use HasFactory;

    protected $table = 'data_laundry_non_members';
    protected $primaryKey = 'no_transaksi';
    protected $fillable = [
        'no_transaksi',
        'tgl_transaksi',
        'nama_customer',
        'alamat',
        'no_hp',
        'keterangan',
    ];
}
