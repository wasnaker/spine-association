<?php

namespace Modules\Association\Database\Seeders;

use Illuminate\Database\Seeder;

class AssociationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('associations')->delete();
        
        \DB::table('associations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'ulid' => '01m1zh85zq8aawcktfy7cyfe7z',
                'code' => 'DPW01',
                'name' => 'DPW RUI Aceh',
                'address' => NULL,
                'province_id' => 1,
                'regency_id' => 1,
                'admin_id' => 42738,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:38',
                'updated_at' => '2026-09-08 03:33:38',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'ulid' => '01m1zh869jmmadf1xs3221savx',
                'code' => 'DPW02',
                'name' => 'DPW RUI Sumatera Utara',
                'address' => NULL,
                'province_id' => 2,
                'regency_id' => 24,
                'admin_id' => 42739,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:38',
                'updated_at' => '2026-09-08 03:33:38',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'ulid' => '01m1zh86jj09wpjdqj8d4jawg9',
                'code' => 'DPW03',
                'name' => 'DPW RUI Sumatera Barat',
                'address' => NULL,
                'province_id' => 3,
                'regency_id' => 57,
                'admin_id' => 42740,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'ulid' => '01m1zh86vhhgp0xb41e5m1jqk7',
                'code' => 'DPW04',
                'name' => 'DPW RUI Riau',
                'address' => NULL,
                'province_id' => 4,
                'regency_id' => 76,
                'admin_id' => 42741,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'ulid' => '01m1zh874csb919xymhm3ga24b',
                'code' => 'DPW05',
                'name' => 'DPW RUI Jambi',
                'address' => NULL,
                'province_id' => 5,
                'regency_id' => 88,
                'admin_id' => 42742,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'ulid' => '01m1zh87d58a19wr9990eh9krj',
                'code' => 'DPW06',
                'name' => 'DPW RUI Sumatera Selatan',
                'address' => NULL,
                'province_id' => 6,
                'regency_id' => 99,
                'admin_id' => 42743,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'ulid' => '01m1zh87p13tdextjcvbqpgrja',
                'code' => 'DPW07',
                'name' => 'DPW RUI Bengkulu',
                'address' => NULL,
                'province_id' => 7,
                'regency_id' => 116,
                'admin_id' => 42744,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'ulid' => '01m1zh87z0kk0yhet924ptemc4',
                'code' => 'DPW08',
                'name' => 'DPW RUI Lampung',
                'address' => NULL,
                'province_id' => 8,
                'regency_id' => 126,
                'admin_id' => 42745,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'ulid' => '01m1zh887swj8j3k3q56k18krr',
                'code' => 'DPW09',
                'name' => 'DPW RUI Kepulauan Bangka Belitung',
                'address' => NULL,
                'province_id' => 9,
                'regency_id' => 141,
                'admin_id' => 42746,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'ulid' => '01m1zh88hb71q0jwkpcnhtezzb',
                'code' => 'DPW10',
                'name' => 'DPW RUI Kepulauan Riau',
                'address' => NULL,
                'province_id' => 10,
                'regency_id' => 148,
                'admin_id' => 42747,
                'is_active' => 1,
                'created_at' => '2026-09-08 03:33:41',
                'updated_at' => '2026-09-08 03:33:41',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}