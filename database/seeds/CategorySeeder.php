<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'fiction',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('categories')->insert([
            'name' => 'non-fiction',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('categories')->insert([
            'name' => 'biography',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('categories')->insert([
            'name' => 'self-help',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('categories')->insert([
            'name' => 'children',
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
    }
}
