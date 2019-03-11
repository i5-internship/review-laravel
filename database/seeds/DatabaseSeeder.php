<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Category::class,10)->create();
        factory(\App\User::class,10)->create();

        $fake = \Faker\Factory::create();

        $users = \App\User::all();

        foreach ($users as $user){
            for ($i=0 ; $i<10 ; $i++){
                \App\Post::create([
                    'user_id' => $user->id,
                    'title' => $fake->name,
                    'description' => $fake->paragraph(5),
                ]);
            }
        }
    }
}
