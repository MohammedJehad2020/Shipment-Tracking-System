<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMenu = Menu::where('key', 'users')->first();
        $permissions = [
            ['user-list',$userMenu->id],
            ['user-create',$userMenu->id],
            ['user-edit',$userMenu->id],
            ['user-delete',$userMenu->id],
            ['user-export',$userMenu->id],
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
                'menu_id' => $permission[1],
                'guard_name' => 'web', 
            ]);
        }
    }
}
