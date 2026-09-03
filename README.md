# spine-association

Modul Association untuk platform **laravelspine** — asosiasi surveyor per provinsi (DPW RUI).

## Entity

- **Association** — 1 asosiasi per provinsi (`province_id` UNIQUE):
  - `code` — kode unik (mis. `DPW01`)
  - `name` — nama asosiasi (mis. `DPW RUI DKI Jakarta`)
  - `province_id` — FK `provinces` (Region), UNIQUE
  - `regency_id` — FK `regencies` (Region), nullable
  - `admin_id` — FK `users`, 1 admin per asosiasi
  - `is_active` — boolean

Tidak ada branch & tidak ada NPWP — entity tunggal per wilayah.

## Dependensi

- `wasnaker/spine-region` (module Region — data provinsi/kabupaten)

## Install

```bash
php artisan module:scan
php artisan migrate
php artisan db:seed --class="Modules\\Association\\Database\\Seeders\\AssociationDemoSeeder"
```

## RBAC

Permission: `association:view/create/edit/delete` (guard sanctum).

Activity log otomatis via Spine lifecycle hooks (`EntityCreated/Updated/Deleted` → `LogAssociationActivity`).
