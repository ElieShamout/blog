<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Permission::create([
            'name' => 'create-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'edit-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'delete-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'publish-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'unpublish-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'rate-post',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'view-users',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'view-user',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'delete-user',
            'guard_name' => 'web'
        ]);



        $adminRole=Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo([
            'publish-post',
            'unpublish-post',
           
            'view-users',
            'view-user',
            'delete-user',
        ]);

        $writerRole=Role::create(['name' => 'writer']);
        $writerRole->givePermissionTo([
            'create-post',
            'edit-post',
            'delete-post',
        ]);

        $userRole=Role::create(['name' => 'user']);
        $userRole->givePermissionTo([
            'rate-post',
        ]);


        User::create([
            'name' => 'Elie Shamout',
            'email' => 'elie@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'jon Doe',
            'email' => 'jon@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($writerRole);

        User::create([
            'name' => 'Sofi Monera',
            'email' => 'sofi@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole($userRole);
    }
}
