Versenykezelő Alkalmazás

Az alkalmazás adatbázis struktúrája megtalálható az alábbi helyen:
my_app\database\migrations
A fájl neve:
2025_01_05_create_database_structure.php
Az adatbázis másolatát egy DB.sql fájlban is megtalálhatjuk probléma esetén.

Teszt felhasználók
Teszt felhasználók lettek generálva, melyek az alábbi helyen találhatóak:
my_app\database\seeders
A fájl neve:
FelhasznalokSeeder.php

Az adatbázis többi értéke üres, ezeket az oldal szolgálja ki.

Funkciók:

Új verseny
Új versenyt adhatunk hozzá az adatbázishoz a szükséges adatok kitöltésével.

Új forduló
A már meglévő versenyekhez új fordulókat adhatunk hozzá. A verseny és a verseny éve kiválasztása után megadhatjuk a forduló adatait.

Versenyző kezelő
Itt tudunk versenyzőket létrehozni a felhasználók és a versenyek alá tartozó fordulók összepárosításával, illetve törölni is tudjuk őket a fordulóktól.

Felhasználók menüpont
A felhasználók menüpontban láthatjuk az adatbázisba regisztrált felhasználókat azok adataival együtt.

Versenyek menüpont
A versenyek menüpontban táblázatba rendezve láthatjuk az összes versenyt, a hozzájuk tartozó fordulókat, illetve a fordulókhoz rendelt versenyzőket (felhasználókat).



**Alkalmazott eszközök:**

- PHP
- Laravel
- JQuery
- JavaScript
- CSS
- HTML5
- MySQL
- Bootstrap