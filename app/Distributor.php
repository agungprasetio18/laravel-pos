<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $table = 'Distributor';

    protected $fillable = ['nama_distributor', 'alamat','no_tlp'];

    public function barang()
    {
        return $this->haMany('App/Barang', 'id');
    }
}
