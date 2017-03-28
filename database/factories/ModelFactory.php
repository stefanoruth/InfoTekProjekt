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
    $trainingTime = roundQuarterHour($faker->dateTimeBetween('2017-03-21 08:00:00', '2017-03-21 20:00:00')->format('H:i:s'), 'H:i');
    $baseAge = $faker->randomElement([3, 6, 8, 12, 14, 16, 20]);
    switch ($baseAge) {
        case 3:
            $topAge = 6;
            break;

        case 6:
            $topAge = 8;
            break;

        case 8:
            $topAge = 12;
            break;

        case 12:
            $topAge = 14;
            break;

        case 14:
            $topAge = 16;
            break;

        case 16:
            $topAge = 20;
            break;

        case 20:
            $topAge = 100;
            break;
    }

	return [
        'title' => $faker->unique()->sentence(3),
        'description' => $faker->text(1000),
        'options' => [
            'age_range' => [
                'from' => $baseAge,
                'to' => $topAge,
            ],
            'training' => [
                'day' => $faker->dayOfWeek(),
                'time' => [
                    'from' => $trainingTime,
                    'to' => date('H:i', strtotime($trainingTime.' +1 hour + 30min')),
                ]
            ]
        ]
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

$factory->define(App\Page::class, function($faker){
    $title = $faker->unique()->sentence();

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text(3000),
    ];
});

$factory->define(App\Gallery::class, function($faker){
    $title = $faker->unique()->sentence();

    return [
        'title' => $title,
        'folder' => str_slug($title),
    ];
});