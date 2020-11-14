<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Merek;
use App\Distributor;

class Barang extends Model
{
    protected $table = 'Barang';

    protected $fillable = ['nama_barang', 'id_merek', 'id_distributor', 'tanggal_masuk', 'harga_barang','stok_barang', 'keterangan'];

    public function merek()
    {
        return $this->belongsTo('App\Merek', 'id_merek');
    }

    public function distributor()
    {
        return $this->belongsTo('App\Distributor', 'id_distributor');
    }

    public function transksi()
    {
        return $this->hasMany('App\Transaksi', 'id');
    }

}
