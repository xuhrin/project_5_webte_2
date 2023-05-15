<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsStudent = [
            // problem
            'problem-list',
            // problem group
            'group-list',
            // generated assignment
            'assignment-list',
            'assignment-create',
            'assignment-edit',
            'assignment-delete'
        ];

        $permissionsTeacher = [
            // problem
            'problem-create',
            'problem-edit',
            'problem-delete',
            // problem group
            'group-create',
            'group-edit',
            'group-delete',
        ];

        foreach ($permissionsStudent as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($permissionsTeacher as $permission) {
            Permission::create(['name' => $permission]);
        }

        $student = Role::create(['name' => 'student']);
        $teacher = Role::create(['name' => 'teacher']);

        $teacher->givePermissionTo($permissionsTeacher);
        $teacher->givePermissionTo($permissionsStudent);
        $student->givePermissionTo($permissionsStudent);
    }
}
