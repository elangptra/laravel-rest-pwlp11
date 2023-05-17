<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table="mahasiswa"; // Eloquent akan membuat mahasiswa menyimpan record di table mahasiswa
    public $timestamps= false;
    protected $primaryKey = "Nim"; // Memanggil isi DB denggan primarykey
    public $incerementing = false;

    protected $fillable = [
        "Nim",
        "Nama",
        "kelas_id",
        "Jurusan",
        "No_Handphone",
    ];
}
