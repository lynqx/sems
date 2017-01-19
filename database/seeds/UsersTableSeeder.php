<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $admin_role = Role::query()
            ->where('role', 'Admin')
            ->first();
        $parent_role = Role::query()
            ->where('role', 'Parents')
            ->first();
        $student_role = Role::query()
            ->where('role', 'Students')
            ->first();
        $teacher_role = Role::query()
            ->where('role', 'Teachers')
            ->first();
        User::query()->delete();
        $admin_user = User::create(array('firstname' => 'Admin', 'middlename' => 'Admin', 'lastname' => 'Admin',
            'email' => 'admin@admin.com', 'password' => Hash::make('admin'),
            'remember_token' => '_token', 'active' => '1'));
        $admin_user->roles()->attach($admin_role->id);

        $parent_user = User::create(array('firstname' => 'Parent', 'middlename' => 'Parent', 'lastname' => 'Parent',
            'email' => 'parent@parent.com', 'password' => Hash::make('parent'),
            'remember_token' => '_token',  'active' => '1'));
        $parent_user->roles()->attach($parent_role->id);

        $teacher_user = User::create(array('firstname' => 'Teacher', 'middlename' => 'Teacher', 'lastname' => 'Teacher',
            'email' => 'teacher@teacher.com', 'password' => Hash::make('teacher'),
            'remember_token' => '_token', 'active' => '1'));
        $teacher_user->roles()->attach($teacher_role->id);

        $student_user = User::create(array('firstname' => 'Student', 'middlename' => 'Student', 'lastname' => 'Student',
            'email' => 'student@student.com', 'password' => Hash::make('student'),
            'remember_token' => '_token', 'active' => '1'));
        $student_user->roles()->attach($student_role->id);
    }
}
