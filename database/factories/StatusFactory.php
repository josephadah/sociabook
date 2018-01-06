<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Status::class, function (Faker $faker) {

	$users = User::lists('id');

    return [ 
        'user_id' => $faker->unique()->randomElement($users),
        'email' => $faker->unique()->safeEmail,
        'body' => $faker->paragraph();
    ];
});
