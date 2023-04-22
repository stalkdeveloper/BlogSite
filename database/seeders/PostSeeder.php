<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range (1,10) as $value){
            DB::table('posts')->insert([
                'user_id' => User::all()->random()->id,
                'title' => $faker->title(),
                'meta_title' => $faker->realText(),
                'body' => $faker->text(),
            ]);
        }
    }
}
