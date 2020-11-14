<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $table = 'Merek';
    
    protected $fillable = ['nama_merek'];

    public function barang()
    {
        return $this->haMany('App/Barang', 'id');
    }
}
