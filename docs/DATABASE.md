# Database Setup and Workflow

Ez a dokumentum a projekt egyedi (Laravel-nél könnyebb) adatbázis rétegét írja le.

## 1. Kapcsolódás

A DB kapcsolat a bootstrap során jön létre:

- `bootstrap/app.php` betölti az `.env`-et
- `\Database\Connect::boot()` inicializálja a Capsule kapcsolatot

Kapcsolódó fájlok:

- `database/Connect.php`
- `bootstrap/app.php`
- `core/functions.php` (`db()` helper)

## 2. Környezeti változók

A szükséges DB env kulcsok:

- `DB_CONNECTION`
- `DB_HOST`
- `DB_PORT`
- `DB_DATABASE`
- `DB_USERNAME`
- `DB_PASSWORD`
- `DB_CHARSET`
- `DB_COLLATION`
- `DB_PREFIX`

Minta: `.env.example`

## 3. DB használata kódból

Globális helper:

```php
db()::table('posts')->get();
```

Példa query:

```php
$post = db()::table('posts')->where('id', 1)->first();
```

## 4. Migrációk

Migráció interface:

- `database/Migration.php`

Migráció futtató:

- `database/migrate.php`

Migráció fájlok helye:

- `database/migrations/*.php`

Példa futtatás:

```bash
php database/migrate.php
```

### Fresh mód

Teljes adatbázis táblatörlés + újrafuttatás:

```bash
php database/migrate.php --fresh
```

Figyelem: minden tábla adata törlődik.

## 5. Seederek

Seeder futtató:

- `database/DatabaseSeeder.php`

Seeder osztályok:

- `database/seeders/PostSeeder.php`
- `database/seeders/AdminSeeder.php`

Futtatás:

```bash
php database/DatabaseSeeder.php
```

## 6. Új migráció létrehozása

Hozz létre egy új fájlt a `database/migrations` mappában, timestampes névvel:

```text
YYYY_MM_DD_HHMMSS_create_xxx_table.php
```

Sablon:

```php
<?php

declare(strict_types=1);

use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();
        $schema->create('example', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        db()->getConnection()->getSchemaBuilder()->dropIfExists('example');
    }
};
```

## 7. Új seeder létrehozása

Hozz létre egy osztályt a `database/seeders` mappában, pl. `ExampleSeeder.php`,
majd add hozzá a `database/DatabaseSeeder.php` fájlhoz.

