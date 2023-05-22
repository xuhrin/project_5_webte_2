<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    public $permissionsStudent = [
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

    public $permissionsTeacher = [
        // problem
        'problem-create',
        'problem-edit',
        'problem-delete',
        // problem group
        'group-create',
        'group-edit',
        'group-delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::where('name', 'student')->exists()) {
            $student = Role::create(['name' => 'student']);

            foreach ($this->permissionsStudent as $permission) {
                Permission::create(['name' => $permission]);
            }

            $student->givePermissionTo($this->permissionsStudent);
        }

        if (!Role::where('name', 'teacher')->exists()) {
            $teacher = Role::create(['name' => 'teacher']);

            foreach ($this->permissionsTeacher as $permission) {
                Permission::create(['name' => $permission]);
            }

            $teacher->givePermissionTo($this->permissionsTeacher);
            $teacher->givePermissionTo($this->permissionsStudent);
        }
    }
}
