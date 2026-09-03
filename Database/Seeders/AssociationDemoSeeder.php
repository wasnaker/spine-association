<?php

declare(strict_types=1);

namespace Modules\Association\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Association\Models\Association;
use Modules\Region\Models\Province;
use Modules\Region\Models\Regency;

/**
 * AssociationDemoSeeder — 10 asosiasi demo (DPW RUI <provinsi>).
 *
 * - 1 association per provinsi (province_id UNIQUE).
 * - Nama: "DPW RUI {nama provinsi}".
 * - Code: "DPW{nomor urut}" (A01-style konsisten dgn modul lain).
 * - 1 admin (User) per association, email admin.dpw.N@wasnaker.lan.
 * - Idempotent: firstOrCreate by province_id.
 *
 * Jalankan: php artisan db:seed --class="Modules\\Association\\Database\\Seeders\\AssociationDemoSeeder"
 */
class AssociationDemoSeeder extends Seeder
{
    public function run(): void
    {
        // 10 provinsi pertama (urut id, sudah ter-seed RegionSeeder)
        $provinces = Province::orderBy('id')->limit(10)->get();
        if ($provinces->count() < 10) {
            $this->command?->warn('Provinsi belum lengkap — jalankan RegionSeeder dulu.');

            return;
        }

        $regencyByProvince = Regency::select('province_id', 'id')
            ->get()
            ->groupBy('province_id')
            ->map(fn ($r) => $r->first()->id);

        $adminPass = 'adminpass';

        foreach ($provinces as $idx => $prov) {
            $seq  = $idx + 1;
            $code = 'DPW' . str_pad((string) $seq, 2, '0', STR_PAD_LEFT);
            $name = "DPW RUI {$prov->name}";

            $admin = User::firstOrCreate(
                ['email' => strtolower("admin.dpw.{$seq}@wasnaker.lan")],
                [
                    'name'      => "Admin {$name}",
                    'password'  => Hash::make($adminPass),
                    'is_active' => true,
                ]
            );

            $assoc = Association::firstOrCreate(
                ['province_id' => $prov->id],
                [
                    'code'       => $code,
                    'name'       => $name,
                    'regency_id' => $regencyByProvince[$prov->id] ?? null,
                    'admin_id'   => $admin->id,
                    'is_active'  => true,
                ]
            );
            $assoc->update([
                'code'       => $code,
                'name'       => $name,
                'admin_id'   => $admin->id,
                'is_active'  => true,
            ]);
        }

        $this->command?->info(sprintf(
            'Demo data siap: %d association (DPW RUI).',
            Association::count()
        ));
    }
}
