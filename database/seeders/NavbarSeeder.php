<?php

namespace Database\Seeders;

use App\Models\Navbar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $links = [
            [
                'name' => 'главная',
                'route' => 'home',
                'ordering' => 1,
            ],
            [
                'name' => 'мои заказы',
                'route' => 'order',
                'ordering' => 2,
            ],
            [
                'name' => 'новости',
                'route' => 'news',
                'ordering' => 3,
            ],
            [
                'name' => 'о компании',
                'route' => 'about',
                'ordering' => 4,
            ]
        ];
        foreach ($links as $navbar) {
            Navbar::create(
                [
                    'name' => $navbar['name'],
                    'route' => $navbar['route'],
                    'ordering' => $navbar['ordering']
                ]
                );
        }
    }
}
