<?php

declare(strict_types=1);

namespace Modules\Association\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Modules\Association\Models\Association;
use Modules\Association\Models\AssociationStaff;
use Spatie\Permission\PermissionRegistrar;

/**
 * AssociationStaffSeeder — buat staff ketua, sekretaris, bendahara untuk
 * satu Association demo, semua diberi role standar `association`.
 */
class AssociationStaffSeeder extends Seeder
{
    public function run(): void
    {
        $pwd = Hash::make('adminpass');

        $association = Association::first();
        if (! $association) {
            $this->command->warn('Association belum ada — jalankan AssociationDemoSeeder dulu.');
            return;
        }

        $positions = [
            'ketua'      => 'Ketua',
            'sekretaris' => 'Sekretaris',
            'bendahara'  => 'Bendahara',
        ];

        foreach ($positions as $slug => $label) {
            $email = "assoc.{$slug}@wasnaker.lan";
            $user  = User::firstOrCreate(
                ['email' => $email],
                [
                    'name'      => "{$label} {$association->name}",
                    'password'  => $pwd,
                    'is_active' => true,
                ]
            );
            $user->assignRole('association');

            AssociationStaff::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'association_id' => $association->id,
                    'realname'       => $label,
                    'jabatan'        => $label,
                    'is_active'      => true,
                ]
            );
        }

        // admin Association (role admin)
        $adminEmail = 'assoc.admin@wasnaker.lan';
        $adminUser  = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name'      => 'Admin Association',
                'password'  => $pwd,
                'is_active' => true,
            ]
        );
        $adminUser->assignRole('association-admin');
        AssociationStaff::updateOrCreate(
            ['user_id' => $adminUser->id],
            [
                'association_id' => $association->id,
                'realname'       => 'Admin',
                'jabatan'        => 'Admin',
                'is_active'      => true,
            ]
        );

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
