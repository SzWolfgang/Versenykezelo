<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felhasznalo extends Model
{
    use HasFactory;

    protected $table = 'felhasznalok';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nev',
        'email',
        'telefonszam',
        'lakcim',
    ];

    public function versenyzok()
    {
        return $this->hasMany(Versenyzo::class, 'felhasznalo_id', 'email');
    }
}
