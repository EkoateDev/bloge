<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRegularUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = DB::table('roles')->where('name', 'Regular')->exists();
        $role = Role::create(['name' => 'Regular']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $role = Role::findByName('Regular');
    }
}
