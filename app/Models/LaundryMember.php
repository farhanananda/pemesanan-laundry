<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundryMember extends Model
{
    use HasFactory;
    protected $table = 'data_laundry_members';
    protected $primaryKey = 'no_transaksi';
    protected $guarded = [];
}
