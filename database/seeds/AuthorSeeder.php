<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
// use Faker\Generator as Faker;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //   use $faker Faker ;
        DB::table('authors')->insert([
            'name' => 'JK Rolling',
            'bio' => 'cndkj vnfd, ,mvf jghroisj nvflvsfovv',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('authors')->insert([
            'name' => 'Jane Austin',
            'bio' => 'cndkj vnfd, ,mvf jghroisj nvflvsfovv',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('authors')->insert([
            'name' => 'AB Cloy',
            'bio' => 'cndkj vnfd, ,mvf jghroisj nvflvsfovv',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('authors')->insert([
            'name' => 'RR Brad',
            'bio' => 'cndkj vnfd, ,mvf jghroisj nvflvsfovv',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
    }
}
