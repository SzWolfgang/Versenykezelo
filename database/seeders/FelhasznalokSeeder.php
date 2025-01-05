<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FelhasznalokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('felhasznalok')->insert([
            [
                'nev' => 'Teszt Elek',
                'email' => 'teszt.elek@verseny.com',
                'telefonszam' => '123456789',
                'lakcim' => '1234 Budapest, Jó Teszt utca 1.',
            ],
            [
                'nev' => 'Minta János',
                'email' => 'minta.janos@verseny.com',
                'telefonszam' => '987654321',
                'lakcim' => '3265 Szeged, Kis Minta tér 2.',
            ],
            [
                'nev' => 'Példa Anna',
                'email' => 'pelda.anna@verseny.com',
                'telefonszam' => '558654321',
                'lakcim' => '2628 Szeged, Nagy Példa utca 12.',
            ],
            [
                'nev' => 'Próba Pál',
                'email' => 'proba.pal@verseny.com',
                'telefonszam' => '509833697',
                'lakcim' => '3247 Miskolc, Próba tér 3.',
            ],
            [
                'nev' => 'Adat Áron',
                'email' => 'aron@verseny.com',
                'telefonszam' => '558634587',
                'lakcim' => '2628 Pécs, Adat utca 20.',
            ],
            [
                'nev' => 'Info Klára',
                'email' => 'InfoKlara@verseny.com',
                'telefonszam' => '111654321',
                'lakcim' => '2628 Szeged, Nagy Klára utca 21.',
            ],
        ]);
    }
}

