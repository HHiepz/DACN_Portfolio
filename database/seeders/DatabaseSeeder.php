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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'first_name' => 'Hữu Hiệp',
            'last_name' => 'Trần',
            'description' => 'Năm kinh nghiệm, kiến thức chuyên môn,...',
            'phone_number' => '(+84) 123 456 789',
            'country' => 'Việt Nam',
            'address' => 'Thành phố Hồ Chí Minh'
        ]);
    }
}
