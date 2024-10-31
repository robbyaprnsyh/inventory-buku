<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = ['judul', 'id_kategori', 'penulis', 'jml_hlmn', 'penerbit', 'tgl_terbit', 'thn_terbit', 'cover'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function deleteImage(){
        if($this->cover && file_exists(public_path('images/buku' . $this->cover))){
            return unlink(public_path('images/buku' . $this->cover));
        }
    }
}
