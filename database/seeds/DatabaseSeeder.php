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
    	$this->teams();
    	$this->posts();
    	$this->users();
    }

    public function teams()
    {
    	factory(App\Team::class, 15)->create();
    }

    public function posts()
    {
        factory(App\Post::class, 50)->create();
    }

    public function users()
    {
        factory(App\User::class, 5)->states('admin')->create();
        factory(App\User::class, 15)->states('trainer')->create();
    	factory(App\User::class, 700)->create();
    }
}
