<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = ['nis','id_kelas','nama','no_telp','alamat','poin','status'];
    protected $table = 'siswas';
    protected $primary = 'nis';
}

