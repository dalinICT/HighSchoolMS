<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password'),
            'profile' => 'user.avif'
        ]);

        $teacher = User::create([
            'name'=>'teacher',
            'email'=>'teacher@teacher.com',
            'password'=>bcrypt('password')
        ]);

        $student = User::create([
            'name'=>'student',
            'email'=>'student@student.com',
            'password'=>bcrypt('password')
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $teacher_role = Role::create(['name' => 'teacher']);
        $student_role = Role::create(['name' => 'student']);


        // $permission = Permission::create(['name' => 'Post access']);
        // $permission = Permission::create(['name' => 'Post edit']);
        // $permission = Permission::create(['name' => 'Post create']);
        // $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        // $permission = Permission::create(['name' => 'Mail access']);
        // $permission = Permission::create(['name' => 'Mail edit']);



        $admin->assignRole($admin_role);
        $teacher->assignRole($teacher_role);
        $student->assignRole($student_role);



        $admin_role->givePermissionTo(Permission::all());
    }
}
