<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Team::class, 15)->create();
        factory(App\Post::class, 50)->create();
        factory(App\User::class, 5)->states('admin')->create();
        factory(App\User::class, 15)->states('trainer')->create();
        factory(App\User::class, 700)->create();

        App\Team::all()->each(function($team){
            $team->users()->attach(App\User::where('role', 'member')->has('teams', 0)->take(rand(10,30))->pluck('id'));
        });
    }
}
