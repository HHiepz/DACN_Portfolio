<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Users
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'first_name' => 'Hữu Hiệp',
            'last_name' => 'Trần',
            'major' => 'Web Developer',
            'description' => 'Năm kinh nghiệm, kiến thức chuyên môn,...',
            'phone_number' => '(+84) 123 456 789',
            'country' => 'Việt Nam',
            'address' => 'Thành phố Hồ Chí Minh'
        ]);

        // Languages
        DB::table('languages')->insert([
            'user_id' => 1,
            'name' => 'Tiếng Anh',
            'short_description' => 'Đọc hiểu cơ bản',
            'priority' => 0
        ]);

        // Skill Categories
        DB::table('skill_categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Frontend',
                    'priority' => 0
                ],
                [
                    'id' => 2,
                    'name' => 'Backend',
                    'priority' => 0
                ]
            ]
        );

        // Skills
        DB::table('skills')->insert(
            [
                [
                    'user_id' => 1,
                    'skill_category_id' => 1,
                    'name' => 'HTML',
                    'priority' => 0
                ],
                [
                    'user_id' => 1,
                    'skill_category_id' => 1,
                    'name' => 'CSS',
                    'priority' => 0
                ],
                [
                    'user_id' => 1,
                    'skill_category_id' => 1,
                    'name' => 'JavaScript',
                    'priority' => 0
                ],
                [
                    'user_id' => 1,
                    'skill_category_id' => 2,
                    'name' => 'PHP',
                    'priority' => 0
                ],
                [
                    'user_id' => 1,
                    'skill_category_id' => 2,
                    'name' => 'Laravel',
                    'priority' => 0
                ]
            ]
        );

        // Technologies
        DB::table('technologies')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'HTML'
                ],
                [
                    'id' => 2,
                    'name' => 'CSS'
                ],
                [
                    'id' => 3,
                    'name' => 'Laravel'
                ],
                [
                    'id' => 4,
                    'name' => 'Bootstrap'
                ],
            ]
        );

        // Product Categories
        DB::table('product_categories')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Bán hàng'
                ],
                [
                    'id' => 2,
                    'name' => 'Portfolio'
                ]
            ]
        );

        // Products
        DB::table('products')->insert(
            [
                [
                    'user_id' => 1,
                    'product_category_id' => 1,
                    'name' => 'Website thương mại điện tử',
                    'type' => 'Dự án cá nhân',
                    'short_description' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates explicabo fugiat voluptatum eos expedita? Necessitatibus! ',
                    'description' => 'Update late...',
                    'priority' => 0,
                    'status' => 'published',
                    'github_link' => 'https://github.com/HHiepz',
                    'preview_link' => '#',
                    'project_started_at' => '2025-01-01',
                    'project_ended_at' => '2025-01-01'
                ]
            ]
        );

        // Product Technology
        DB::table('product_technology')->insert(
            [
                [
                    'product_id' => 1,
                    'technology_id' => 1
                ],
                [
                    'product_id' => 1,
                    'technology_id' => 2
                ],
                [
                    'product_id' => 1,
                    'technology_id' => 3
                ],
                [
                    'product_id' => 1,
                    'technology_id' => 4
                ],
            ]
        );
    }
}
