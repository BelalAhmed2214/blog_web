<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
         $admin = Role::create(['name' => 'admin']);
         $editor = Role::create(['name' => 'editor']);
         $user = Role::create(['name' => 'user']);
        
         // Create permissions
         Permission::create(['name' => 'view posts']);
         Permission::create(['name' => 'create posts']);
         Permission::create(['name' => 'edit posts']);
         Permission::create(['name' => 'delete posts']);
 
         // Assign permissions to roles
         $admin->givePermissionTo(Permission::all());
         $editor->givePermissionTo(['view posts', 'create posts', 'edit posts']);
         $user->givePermissionTo('view posts');
    }
}
