<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'kategori', 'penulis', 'jml_hlmn', 'penerbit', 'tgl_terbit', 'thn_terbit'];
    public $timestamps = true;
}
