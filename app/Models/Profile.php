<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'tgl_lahir',
        'jk',
        'alamat',
        'agama',
        'cover',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hobi()
    {
        return $this->belongsToMany(Hobi::class, 'hobi_profile', 'id_profile', 'id_hobi');
    }
    public function deleteImage(){
        if($this->cover && file_exists(public_path('images/profile' . $this->cover))){
            return unlink(public_path('images/profile' . $this->cover));
        }
    }
}
