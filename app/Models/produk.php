<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $fillable = [
      'nm_produk','kategori_id','merek_id','deskripsi','img','harga','stock'
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }

    public function merek(){
        return $this->belongsTo(merek::class);
    }
}
