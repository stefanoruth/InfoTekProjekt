<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
        factory(App\User::class)->states('admin')->create(['email' => 'admin@example.com']);
        factory(App\User::class)->create(['email' => 'user@example.com']);
        factory(App\User::class, 15)->states('admin')->create();
        factory(App\User::class, 700)->create();
        factory(App\Event::class, 50)->create();

        App\Team::all()->each(function($team){
            $team->users()->attach(App\User::where('role', 'member')->has('teams', 0)->take(rand(10,30))->pluck('id'));
        });

        factory(App\Page::class)->create(['slug' => 'about', 'title' => 'Om Klubben']);


        $faker = Factory::create();

        factory(App\Gallery::class, 5)->create()->each(function($gallery) use ($faker){
            Storage::makeDirectory('public/'.$gallery->folder);
            foreach (range(1, rand(3,6)) as $i) {
                //$faker->image(storage_path('app/public/'.$gallery->folder));
            }
        });
    }
}
