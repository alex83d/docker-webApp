<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $category = [
            [
                'title' => 'Action',
                'description' => 'Экшн игры'
            ],
            [
                'title' => 'RPG',
                'description' => 'Экшн игры'
            ],
            [
                'title' => 'Квесты',
                'description' => 'Экшн игры'
            ],
            [
                'title' => 'Онлайн-игры',
                'description' => 'Экшн игры'
            ],
            [
                'title' => 'Стратегии',
                'description' => 'Экшн игры'
            ]
        ];
        foreach ($category as $cat) {
            Category::create(
                [
                    'title' => $cat['title'],
                    'description' => $cat['description']
                ]
            );
        }
    }
}
