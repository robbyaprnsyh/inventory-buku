<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission Buku
        $read_buku = Permission::create(['name' => 'read-buku']);
        $create_buku = Permission::create(['name' => 'create-buku']);
        $edit_buku = Permission::create(['name' => 'edit-buku']);
        $delete_buku = Permission::create(['name' => 'delete-buku']);
        // End Permission Buku

        // Role User
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo($read_buku);

        // Role Admin
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        // Seeder Admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
        ]);

        $admin->assignRole('admin');

        $profile = Profile::create(([
            'id_user' => $admin->id,
            'nama_lengkap' => 'admin',
            'tgl_lahir' => '1990-09-19',
            'jk' => 'Laki-laki',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'cover' => 'default_profile.png',
        ]));
    }
}
