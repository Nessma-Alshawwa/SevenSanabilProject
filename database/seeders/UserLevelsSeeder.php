<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserLevel;

class UserLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLevel::insert([
            ['name'=>'أدمن'],
            ['name'=>'لجنة زكاة'],
            ['name'=>'متبرع']
        ]);
    }
}
