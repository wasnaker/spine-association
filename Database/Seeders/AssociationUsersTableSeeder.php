<?php

namespace Modules\Association\Database\Seeders;

use Illuminate\Database\Seeder;

class AssociationUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->whereBetween('id', [42738, 42751])->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 42738,
                'name' => 'hasan-basri',
                'email' => 'hasan-basri@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$RSpVsdqHTVuUGyfP8/niGO4ymCNWAJAhsd9A.qnU3jj7yPSUBz2FS',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:38',
                'updated_at' => '2026-09-08 03:33:38',
            ),
            1 => 
            array (
                'id' => 42739,
                'name' => 'siti-aminah',
                'email' => 'siti-aminah@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$D/.jApQc0IDXqK6M.9dF3.0Vjg/VElyMCBQR1/mRtXF3NtMaUJAN6',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:38',
                'updated_at' => '2026-09-08 03:33:38',
            ),
            2 => 
            array (
                'id' => 42740,
                'name' => 'zulkifli-abdullah',
                'email' => 'zulkifli-abdullah@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$esbUwRJOd923zZzUsxzbRe0D/vp7AkU1umcMwUbI8x45uwE3BBtL.',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
            ),
            3 => 
            array (
                'id' => 42741,
                'name' => 'rahmat-hidayat',
                'email' => 'rahmat-hidayat@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$Uur5mPQMPhOpTHXy.28OouROfUEcO9J/UOX/HWW0r97suMEpA94Ka',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
            ),
            4 => 
            array (
                'id' => 42742,
                'name' => 'sri-melati',
                'email' => 'sri-melati@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$6PSTAcMRncIiUNc9GwXw7eEORXEiBqV/exLf/sfi.zFQkz7e.CxFO',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
            ),
            5 => 
            array (
                'id' => 42743,
                'name' => 'ahmad-fauzi',
                'email' => 'ahmad-fauzi@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$nQ6tIzPARI0gt4PM7YJH8eKmvs2r9QxLx4mvM/QSDzATcmGTk2asC',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:39',
                'updated_at' => '2026-09-08 03:33:39',
            ),
            6 => 
            array (
                'id' => 42744,
                'name' => 'dewi-anggraini',
                'email' => 'dewi-anggraini@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$OhWhyy6Hu1f1WnEs7jGdje1wZo4wIl7jiQJltTz4JTukfDUcgUte.',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
            ),
            7 => 
            array (
                'id' => 42745,
                'name' => 'bambang-setiawan',
                'email' => 'bambang-setiawan@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$4SocAvYAvcNBd5SB5JnSjevJmgJ/TIwu97tnxQNhT4jmwvVTw3HyK',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
            ),
            8 => 
            array (
                'id' => 42746,
                'name' => 'maya-sari',
                'email' => 'maya-sari@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$Z5Darp5aDQCY/3hMqdHo7eCW/LHsERjOaFOF3Iy898.6Lvb5S6IKC',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:40',
                'updated_at' => '2026-09-08 03:33:40',
            ),
            9 => 
            array (
                'id' => 42747,
                'name' => 'rudi-pratama',
                'email' => 'rudi-pratama@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$GALGgdZ2KIvBlAY5LqsSF.H//D42bYu/foNjrA9AgpYVRZn.CURc.',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:41',
                'updated_at' => '2026-09-08 03:33:41',
            ),
            10 => 
            array (
                'id' => 42748,
                'name' => 'agus-salim',
                'email' => 'agus-salim@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$GrrUyzQpzV8truAKV.V.Me1eSYWG4oMkvDYBpLlodIE7mK.KKIM5i',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:41',
                'updated_at' => '2026-09-08 03:33:41',
            ),
            11 => 
            array (
                'id' => 42749,
                'name' => 'fitri-handayani',
                'email' => 'fitri-handayani@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$GrrUyzQpzV8truAKV.V.Me1eSYWG4oMkvDYBpLlodIE7mK.KKIM5i',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
            12 => 
            array (
                'id' => 42750,
                'name' => 'joko-susilo',
                'email' => 'joko-susilo@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$GrrUyzQpzV8truAKV.V.Me1eSYWG4oMkvDYBpLlodIE7mK.KKIM5i',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
            13 => 
            array (
                'id' => 42751,
                'name' => 'nurul-aini',
                'email' => 'nurul-aini@wasnaker.lan',
                'email_verified_at' => NULL,
                'password' => '$2y$12$GrrUyzQpzV8truAKV.V.Me1eSYWG4oMkvDYBpLlodIE7mK.KKIM5i',
                'is_active' => 1,
                'avatar' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-09-08 03:33:42',
                'updated_at' => '2026-09-08 03:33:42',
            ),
        ));
        
        
    }
}