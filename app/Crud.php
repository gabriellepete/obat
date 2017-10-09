<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'Obat';
    protected $primaryKey = 'Kode_Obat';
    protected $fillable = ['Nama_Obat','Jenis_Obat','Katagori','Harga_Obat','Jumalah_Obat'];
    public $timestamps = false;
}
