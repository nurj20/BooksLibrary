<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Events\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          $user = \App\User::create([
          'name' => 'Xyz',
          'address' => '22 Unkown street ',
          'email' => 'xyz@email.com',
          'password' => Hash::make('12341234'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),

      ]);
      event('eloquent.created: \App\User', $user);

      $user = \App\User::create([
        'name' => 'Def',
          'address' => '22 Unkown street ',
          'email' => 'def@email.com',
          'password' => Hash::make('12341234'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
        ]);
        event('eloquent.created: \App\User', $user);

        $user = \App\User::create([
            'name' => 'Abc',
              'address' => '22 Unkown street ',
              'email' => 'abc@email.com',
              'password' => Hash::make('12341234'),
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
            event('eloquent.created: \App\User', $user);

            $this->call([
                CategorySeeder::class,
                AuthorSeeder::class,
                BookSeeder::class,
            ]);


    }
}
