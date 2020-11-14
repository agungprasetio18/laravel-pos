<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'Transaksi';

    protected $fillable = ['id_transaksi', 'id_barang', 'id_user', 'jumlah_beli', 'total_beli', 'total_harga', 'tanggal_beli'];
    
    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
