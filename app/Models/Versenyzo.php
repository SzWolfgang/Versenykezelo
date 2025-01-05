<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versenyzo extends Model
{
    use HasFactory;

    protected $table = 'versenyzok';
    public $timestamps = false;
    protected $fillable = [
        'fordulo_id',
        'felhasznalo_id',
    ];

    public function felhasznalo()
    {
        return $this->belongsTo(Felhasznalo::class, 'felhasznalo_id', 'email');
    }

    public function fordulo()
    {
        return $this->belongsTo(Fordulo::class, 'fordulo_id');
    }
}

