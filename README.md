# szakoereg

PHP 8.4 MVC application (custom core on Illuminate components), running on XAMPP.

## Setup

```bash
composer install
cp .env.example .env   # then set the DB_* values
php database/migrate.php
php database/DatabaseSeeder.php
```

Dev server: XAMPP Apache at http://localhost:8080.

## Documentation

- Database guide: `docs/DATABASE.md`
