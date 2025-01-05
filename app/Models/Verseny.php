<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verseny extends Model
{
    protected $table = 'versenyek';

    protected $primaryKey = ['nev', 'ev'];

    public $incrementing = false;

    public $timestamps = false;
    
    protected $fillable = [
        'nev',
        'ev',
        'elerheto_nyelvek',
        'pontko_jo',
        'pontok_rossz',
        'pontok_ures',
    ];
    public function fordulok()
    {
        return $this->hasMany(Fordulo::class,'verseny_nev', 'nev');
    }
}
