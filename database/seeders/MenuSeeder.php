<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['users', 'Users Management']
        ];
        foreach ($menus as $menu) {
            Menu::create(['key'=> $menu[0],'name' => $menu[1]]);
        }
    }
}
