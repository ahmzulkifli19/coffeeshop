<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'nomor', 'email', 'harga', 'menu', 'size', 'keterangan',
    ];
}
