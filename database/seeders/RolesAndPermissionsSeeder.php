<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions(); //
        //Misc
        $miscPermission = Permission::create(['name' => 'N/A','guard_name' => 'web']);
        //USER MODEL
        $userPermission1 = Permission::create(['name' => 'view User','guard_name' => 'web']);
        $userPermission2 = Permission::create(['name' => 'create User','guard_name' => 'web']);
        $userPermission3 = Permission::create(['name' => 'update User','guard_name' => 'web']);
        $userPermission4 = Permission::create(['name' => 'delete User','guard_name' => 'web']);

        //USER PRODUCT
        $productPermission1 = Permission::create(['name' => 'view Product','guard_name' => 'web']);
        $productPermission2 = Permission::create(['name' => 'create Product','guard_name' => 'web']);
        $productPermission3 = Permission::create(['name' => 'update Product','guard_name' => 'web']);
        $productPermission4 = Permission::create(['name' => 'delete Product','guard_name' => 'web']);

        //USER PRODUCT TYPE
        $productTypePermission1 = Permission::create(['name' => 'view Product Type','guard_name' => 'web']);
        $productTypePermission2 = Permission::create(['name' => 'create Product Type','guard_name' => 'web']);
        $productTypePermission3 = Permission::create(['name' => 'update Product Type','guard_name' => 'web']);
        $productTypePermission4 = Permission::create(['name' => 'delete Product Type','guard_name' => 'web']);

        //USER NEWS
        $NewsPermission1 = Permission::create(['name' => 'view News','guard_name' => 'web']);
        $NewsPermission2 = Permission::create(['name' => 'create News','guard_name' => 'web']);
        $NewsPermission3 = Permission::create(['name' => 'update News','guard_name' => 'web']);
        $NewsPermission4 = Permission::create(['name' => 'delete News','guard_name' => 'web']);

        //PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'view Permission','guard_name' => 'web']);
        $permission2 = Permission::create(['name' => 'create Permission','guard_name' => 'web']);
        $permission3 = Permission::create(['name' => 'update Permission','guard_name' => 'web']);
        $permission4 = Permission::create(['name' => 'delete Permission','guard_name' => 'web']);

        //ADMINS
        $adminPermission1 = Permission::create(['name' => 'read Admin','guard_name' => 'web']);
        $adminPermission2 = Permission::create(['name' => 'update Admin','guard_name' => 'web']);

        //CREATE ADMINS
        $userRole = Role::create(['name' => 'user'])->syncPermissions([$miscPermission,]);

        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $productPermission1,
            $productPermission2,
            $productPermission3,
            $productPermission4,
            $productTypePermission1,
            $productTypePermission2,
            $productTypePermission3,
            $productTypePermission4,
            $NewsPermission1,
            $NewsPermission2,
            $NewsPermission3,
            $NewsPermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
        ]);

        // $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
        //     $userPermission1,
        //     $userPermission2,
        //     $userPermission3,
        //     $userPermission4,
        //     $permission1,
        //     $permission2,
        //     $permission3,
        //     $permission4,
        //     $adminPermission1,
        //     $adminPermission2,
        // ]);

        // $moderatorRole = Role::create(['name' => 'moderator'])->syncPermissions([
        //     $userPermission2,
        //     $permission2,
        //     $adminPermission1,
        // ]);
        // $developerRole = Role::create(['name' => 'developer'])->syncPermissions([
        //     $adminPermission1,
        // ]);

        User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'super@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'super admin1',
            'is_admin' => 1,
            'email' => 'super@admin1.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        // User::create([
        //     'name' => 'admin',
        //     'is_admin' => 1,
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123456789'),
        //     'remember_token' => Str::random(10),
        // ])->assignRole($adminRole);

        // User::create([
        //     'name' => 'moderator',
        //     'is_admin' => 1,
        //     'email' => 'moderator@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123456789'),
        //     'remember_token' => Str::random(10),
        // ])->assignRole($moderatorRole);

        // User::create([
        //     'name' => 'developer',
        //     'is_admin' => 1,
        //     'email' => 'developer@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123456789'),
        //     'remember_token' => Str::random(10),
        // ])->assignRole($developerRole);

        for($i=1; $i < 10; $i++){
            User::create([
                'name' => 'Test '.$i,
                'is_admin' => 0,
                'email' => 'test'.$i.'@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123456789'),
                'remember_token' => Str::random(10),
            ])->assignRole($userRole);
        }

    }
}
