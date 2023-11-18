<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $fillable = ['id_artikel','judul_artikel','author','tahun_terbit','kategori'];
    protected $table = 'artikel';
    public $timestamps = false;
}
