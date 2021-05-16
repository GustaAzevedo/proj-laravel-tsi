<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederUsuarioAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([	'name' => 'gustavo',
    							'email' => 'gupereira35@outlook.com',
    							'password' => bcrypt('233200254')]);

    	$role = Role::create(['name' => 'Admin']);

    	$permissions = Permission::pluck('id','id')->all();

		$role->syncPermissions($permissions);

		$user->assignRole([$role->id]);
    }
}
