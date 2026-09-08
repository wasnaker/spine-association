<?php

namespace Modules\Association\Database\Seeders;

use Illuminate\Database\Seeder;

class AssociationStaffsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('association_staffs')->delete();
        
        \DB::table('association_staffs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 42748,
                'association_id' => 1,
                'realname' => 'Agus Salim',
                'jabatan' => 'Ketua',
                'phone' => NULL,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 42749,
                'association_id' => 1,
                'realname' => 'Fitri Handayani',
                'jabatan' => 'Sekretaris',
                'phone' => NULL,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 42750,
                'association_id' => 1,
                'realname' => 'Joko Susilo',
                'jabatan' => 'Bendahara',
                'phone' => NULL,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 42751,
                'association_id' => 1,
                'realname' => 'Nurul Aini',
                'jabatan' => 'Admin',
                'phone' => NULL,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
        ));
        
        
    }
}