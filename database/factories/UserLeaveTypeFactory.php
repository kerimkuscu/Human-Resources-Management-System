<?php

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function(Faker $faker) {
    return [
        'leave_type'     => $faker->title,
        'leaves_per_day' => rand(1, 15),
    ];
});
