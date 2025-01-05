<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fordulo extends Model
{
    use HasFactory;

    protected $table = 'fordulok';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'verseny_nev',
        'verseny_ev',
        'nev',
        'kezdes_idopont',
        'zaras_idopont',
    ];

    public function verseny()
    {
        return $this->belongsTo(Verseny::class, ['versenev', 'verseny_ev'], ['nev', 'ev']);
    }
    public function versenyzok()
    {
        return $this->belongsToMany(Felhasznalo::class, 'versenyzok', 'fordulo_id', 'felhasznalo_id');
    }
}
