<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'role' => 'member',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'birthdate' => $faker->date('Y-m-d', '2010-12-31'),
        'gender' => $faker->randomElement(['male', 'female']),
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', function ($faker) {
    return [
        'role' => 'admin',
    ];
});

$factory->state(App\User::class, 'trainer', function ($faker) {
    return [
        'role' => 'trainer',
    ];
});

$factory->define(App\Team::class, function(Faker\Generator $faker) {
	return [
        'title' => $faker->unique()->sentence(3),
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker) {
    $title = $faker->unique()->sentence();

	return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text(3000),
        'created_at' => $faker->dateTimeBetween('-3 years'),
    ];
});