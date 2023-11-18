<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id_kategori','nama_kategori'];
    protected $table = 'kategori';
    public $timestamps = false;
}
