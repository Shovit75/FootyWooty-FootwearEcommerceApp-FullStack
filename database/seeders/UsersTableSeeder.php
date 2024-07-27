<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        // Define permissions to be created
        $permissionnames = [
            'Product_navigations',
            'User_navigations',
        ];

        // Create permissions and store them in an array
        $permissions = [];
        foreach ($permissionnames as $p) {
            $permissions[] = Permission::create([
                'name' => $p,
                'guard_name' => 'web',
            ]);
        }

        // Define roles to be created
        $rolenames = [
            'Superadmin',
            'Product_Manager',
        ];

        // Create roles and attach permissions
        foreach ($rolenames as $r) {
            $role = Role::create([
                'name' => $r,
                'guard_name' => 'web',
            ]);

            // Attach all permissions to each role
            foreach ($permissions as $permission) {
                $role->permissions()->attach($permission->id);
            }
        }

        // Create a user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
        ]);

        // Assign the 'Superadmin' role to the user
        $superadminRole = Role::where('name', 'Superadmin')->first();
        if ($superadminRole) {
            $user->roles()->attach($superadminRole->id);
        }
    }
}
