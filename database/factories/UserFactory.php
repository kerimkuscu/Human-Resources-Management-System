<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\User::class, function(Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token'    => str_random(10),
    ];
});

$factory->define(\App\Models\UserLeave::class, function(Faker $faker) {

    /** @var \Illuminate\Support\Carbon $date */
    $date = $faker->date();

    return [
        'user_id'     => create(\App\Models\User::class),
        'started_at'  => $date,
        'ended_at'    => \Illuminate\Support\Carbon::createFromFormat('Y-m-d', $date)->addDays(15)->format('Y-m-d'),
        'description' => $faker->paragraph,
    ];
});
