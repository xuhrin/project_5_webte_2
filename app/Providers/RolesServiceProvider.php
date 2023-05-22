<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesServiceProvider extends ServiceProvider
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
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
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
