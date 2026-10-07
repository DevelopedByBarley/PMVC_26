# Regisztrációs backend

A ZeroDay 2026 konferencia jelentkezéseinek teljes folyamata: publikus form →
adatbázis → admin elbírálás (elfogadás / elutasítás).

## 1. Folyamat

```
publikus form (/#register)
        │  POST /registration
        ▼
RegistrationController::store()      validáció, rate limit, duplikáció-szűrés
        │
        ▼
RegistrationService::submit()        registrations + registration_events (submitted)
        │
        ▼
/registration/{token}                visszaigazoló oldal az azonosítóval
        ⋮
admin: /admin/registrations          lista, szűrés, keresés, CSV export
        │  POST .../{id}/approve | reject | revert | note | delete
        ▼
RegistrationService::approve()/reject()
        │
        ▼
registrations.status + registration_events (approved / rejected)
```

Az e-mail küldés **még nincs bekötve** – a `RegistrationService` `submit()`,
`approve()` és `reject()` metódusai a hookok helye (lásd a fájl elején lévő TODO-t).
A levél sablonok view fájlok lesznek (`resources/views/emails/…`).

## 2. Táblák

### `registrations`

| oszlop | típus | leírás |
| --- | --- | --- |
| `id` | bigint | |
| `reference` | string(20), unique | emberi azonosító, pl. `ZD26-7F3A91` |
| `token` | string(64), unique | a visszaigazoló oldal titkos linkje |
| `type` | string(20) | `attendee` \| `speaker` |
| `name`, `email`, `company`, `phone` | string | a form mezői |
| `mode` | string(20) | `online` \| `in_person` |
| `language` | string(5) | a kitöltés nyelve (`hu` / `en`) |
| `status` | string(20) | `pending` \| `approved` \| `rejected` |
| `gdpr_accepted_at` | timestamp | az adatkezelési tájékoztató elfogadása |
| `decision_reason` | text | döntés indoklása (a jelentkező is látja/kapja) |
| `admin_note` | text | csak belső, adminok közti megjegyzés |
| `reviewed_by` | FK `admins` | ki döntött |
| `reviewed_at` | timestamp | mikor |
| `ip_address`, `user_agent` | string | audit / spam-szűrés |

### `registration_events`

Idővonal minden regisztrációhoz: `action` (`submitted`, `approved`, `rejected`,
`reverted`, `note`), `from_status`, `to_status`, `note`, `admin_id`.
A regisztráció törlésekor kaszkádolva törlődik.

### Törölt (nem ide tartozó) táblák

A PMVC sablonból örökölt `users` és `posts` táblát a
`2026_08_27_000001_drop_legacy_tables.php` migráció eltávolítja, a hozzá tartozó
modellek / controllerek / route-ok / view-k szintén törölve lettek.

## 3. Kód szerkezet

```
app/
  Http/Controllers/
    HomeController.php                 landing (nyelv + form adatok)
    RegistrationController.php         publikus: store(), success()
    Admin/RegistrationController.php   admin: index, show, approve, reject,
                                       revert, note, destroy, export
  Models/
    Registration.php                   scope-ok (status/type/mode/search), címkék
    RegistrationEvent.php              idővonal elem
  Services/
    RegistrationService.php            üzleti logika + naplózás

routes/
  registration.php                     POST /registration, GET /registration/{token}
  admin/registrations.php              /admin/registrations/* (admin middleware)

config/
  event.php                            esemény adatai (dátum, helyszín, kontakt)
  registration.php                     nyitva/zárva, throttle, duplikáció-tiltás

resources/
  css/admin.css                        admin felület stílusa
  css/toast.css                        toast komponens
  js/admin.js
  lang/{hu,en}/home.php                landing szövegek
  lang/{hu,en}/navbar.php, footer.php  komponens szövegek
  lang/{hu,en}/registration.php        visszaigazoló oldal szövegei
  lang/{hu,en}/validation.php          validációs üzenetek
  views/pages/registration/success…    visszaigazoló oldal
  views/pages/admin/registrations/…    lista + részletek
```

A view fájlok **csak markupot** tartalmaznak: a szövegek nyelvi fájlból,
az adatok a controllerből jönnek, a stílus és a JS külön fájlban van.

## 4. Konfiguráció (.env)

```dotenv
REG_OPEN_ATTENDEE=true     # résztvevői regisztráció nyitva
REG_OPEN_SPEAKER=true      # előadói regisztráció nyitva
REG_THROTTLE_MAX=5         # max beküldés / IP
REG_THROTTLE_DECAY=900     # az időablak másodpercben
EVENT_CONTACT_EMAIL=info@zeroday.gde.hu
```

Zárás: állítsd a megfelelő `REG_OPEN_*` kulcsot `false`-ra. A form letiltja az
adott típust, és a controller sem fogadja be (nem csak a felület tiltja).

## 5. Admin felület

- `/admin/registrations` – lista, státusz/típus/részvétel szűrő, keresés
  (név, e-mail, cég, azonosító), gyorsszűrő kártyák, lapozás
- listából egy kattintással **Elfogad** / **Elutasít** (a szűrés megmarad)
- `/admin/registrations/{id}` – minden adat, döntés indoklással, belső
  megjegyzés, előzmények idővonala, végleges törlés
- `/admin/registrations/export` – a szűrt lista CSV-ben (UTF-8 BOM, `;`)
- téves döntés visszavonható: „Visszaállítás elbírálásra”

## 6. Futtatás

```bash
php database/migrate.php          # táblák létrehozása
php database/DatabaseSeeder.php   # admin felhasználó
```
