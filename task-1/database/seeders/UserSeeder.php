<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(
            [
                'name' => 'Homam Haidar',
                'email' => 'homamhaidar18@gmail.com',
                'password' => Hash::make('12345678'),
            ]);
        $role = Role::create(['name' => 'Admin']);

        $permissions = ['add', 'edit', 'delete', 'show'];

        foreach ($permissions as $permission) {
            Permission::create(
                ['name' => $permission . ' product'],
            );
            Permission::create(
                ['name' => $permission . ' category'],
            );
            Permission::create(
                ['name' => $permission . ' user'],
            );
            Permission::create(
                ['name' => $permission . ' role'],
            );
        }
        $permission = Permission::all();

        $role->givePermissionTo($permission);

        $user->assignRole('Admin');
    }
}
