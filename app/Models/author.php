<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;
    protected $fillable = ['author_id','nama','email'];
    protected $table = 'author';
    public $timestamps = false;
}
