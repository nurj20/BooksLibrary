<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'title' => 'Slime' ,
            'category_id' => 1,
            'author_id' =>2 ,
            'description' =>'dfldskfjl dvmds;vm camdc; ' ,
            'pages' => 200,
            'created_at' =>Carbon::now() ,
            'updated_at' => Carbon::now(),
        ]);
        DB::table('books')->insert([
            'title' => 'Pinch of Nom' ,
            'category_id' => 2,
            'author_id' => 2,
            'description' => 'kewpf smv.m ,dv ,dvm ',
            'pages' => 500,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('books')->insert([
            'title' => 'Harry Pottor' ,
            'category_id' =>3 ,
            'author_id' => 1,
            'description' => 'vc .,mv nfeoifn AVDajv',
            'pages' => 250,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('books')->insert([
            'title' => 'There is no planet B' ,
            'category_id' =>4 ,
            'author_id' =>2 ,
            'description' => 'df,sdlfm,; svmsv',
            'pages' => 340,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);
        DB::table('books')->insert([
            'title' => 'Turn left at Oroin' ,
            'category_id' => 1,
            'author_id' => 4,
            'description' => 'dsvmdv mvn,x.vn nvosifjo ',
            'pages' => 600,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'Basic Pathology' ,
            'category_id' =>3 ,
            'author_id' => 2,
            'description' =>'fkdsl;fd; svmslkvgm vxnc,b' ,
            'pages' => 1000,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'Yes to Europe' ,
            'category_id' => 6,
            'author_id' => 3,
            'description' =>'sd,s/lmv, d vx  dnglsr v ,v' ,
            'pages' => 307,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'crushed' ,
            'category_id' => 6,
            'author_id' =>1 ,
            'description' => 'xnvxd ruiwer khflhk vjhsc',
            'pages' =>220 ,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'What you Did' ,
            'category_id' => 7,
            'author_id' =>3 ,
            'description' => 'djsglk dgmnsdgl ugheowghegio ndsnvsd ',
            'pages' => 569,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'Life of Pi' ,
            'category_id' => 8,
            'author_id' =>2 ,
            'description' => 'vdnsv,n ds dsvnsdkjv v dslvk',
            'pages' => 235,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);

        DB::table('books')->insert([
            'title' => 'Dear Zoo' ,
            'category_id' =>2 ,
            'author_id' =>4 ,
            'description' => ',dslvm v snvg svgsmgkvmk;',
            'pages' =>670 ,
            'created_at' =>Carbon::now() ,
            'updated_at' =>Carbon::now() ,
        ]);


    }
}
