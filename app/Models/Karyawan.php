<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawan";
    public $timestamps = false;
    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nama',
        'status',
        'jenis_kelamin',
    ];
}
