<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        // create permissions
        //Permission::create(['name' => 'edit procedimiento']);
        //Permission::create(['name' => 'delete procedimiento']);
        //Permission::create(['name' => 'create procedimiento']);
        //Permission::create(['name' => 'archivar procedimiento']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'administracion']);
        $role = Role::create(['name' => 'configuracion']);
        $role = Role::create(['name' => 'desarrollo']);
        $role = Role::create(['name' => 'super-admin']);
        
        //$role->givePermissionTo(['create procedimiento']);

        // $role = Role::create(['name' => 'admin'])
        //     ->givePermissionTo(['publish articles', 'unpublish articles']);

        
        //$role->givePermissionTo(Permission::all());
    }
}
