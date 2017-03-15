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
    	collect([
        	'Gymnastik - Børn 6-10år',
        	'Gymnastik - Unge',
        	'Gymnastik - Elite',
        	'Gymnastik Hold 1',
        	'Gymnastik Hold 2',
        	'Håndbold - Øvet/Elite',
        	'Håndbold - Senior',
        	'Håndbold - Veteraner og pensionister',
        ])->each(function($team){
        	factory(App\Team::class)->create(['title' => $team]);
        });
    }

    public function posts()
    {
    	collect([
    		['Lørdag den 22. april bliver der afholdt klubmesterskaber', null],
    		['Louises indsats ved senior DM er absolut godkendt', null],
    		['Indkaldelse til ordinær generalforsamling', null],
    	])->each(function($post){
    		factory(App\Post::class)->create(['title' => $post[0], 'slug' => str_slug($post[0]), 'body' => $post[1]]);
    	});
    }

    public function users()
    {
    	factory(App\User::class, 700)->create();
    }
}
