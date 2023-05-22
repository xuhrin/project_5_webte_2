<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissions
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
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
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

        return $next($request);
    }
}
