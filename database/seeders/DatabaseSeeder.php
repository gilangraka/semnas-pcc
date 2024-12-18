<?php

namespace Database\Seeders;

use App\Models\RefPeserta;
use App\Models\RefStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $status = ['Belum Digunakan' => 'text-success', 'Sudah Digunakan' => 'text-danger'];
        foreach ($status as $key => $value) {
            $status = new RefStatus([
                'nama_status' => $key,
                'css' => $value
            ]);
            $status->save();
        }

        $roles = ['Administrator', 'Panitia', 'Peserta'];
        foreach ($roles as $key => $value) {
            DB::table('roles')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $permissions = ['Reset Password', 'Tambah Panitia', 'Lihat User', 'Scan QR'];
        foreach ($permissions as $key => $value) {
            DB::table('permissions')->insert([
                'name' => $value,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $role_has_permissions = [
            '1' => ['1', '2', '3', '4'],
            '2' => ['3', '4']
        ];
        foreach ($role_has_permissions as $role_id => $permissions) {
            foreach ($permissions as $permission_id) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permission_id,
                    'role_id' => $role_id
                ]);
            }
        }

        $user = new User([
            'name' => 'Admin',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        $user->save();
        $user->assignRole('Administrator');

        $ref_peserta = new RefPeserta([
            'user_id' => $user->id,
            'nomor_hp' => '085742089646',
            'instansi' => 'Politeknik Negeri Semarang',
            'profesi' => 'Mahasiswa'
        ]);
        $ref_peserta->save();
    }
}
