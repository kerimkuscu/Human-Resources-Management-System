<?php

use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function(Faker $faker) {
    return [
        'name'              => $faker->name,
        'nationality'       => $faker->country,
        'birthday'          => $faker->date('Y-m-d'),
        'gender'            => rand(0, 1),
        'marital_status'    => rand(0, 4),
        'driver_license'    => rand([0, 1]),
        'employment_status' => rand(0, 4),
        'job_title'         => $faker->jobTitle,
        'address'           => $faker->address,
        'city'              => $faker->city,
        'country'           => $faker->country,
        'province'          => $faker->country,
        'postal_code'       => $faker->postcode,
        'home_phone'        => $faker->phoneNumber,
        'mobile_phone'      => $faker->phoneNumber,
        'work_phone'        => $faker->phoneNumber,
        'emergency_contact' => $faker->phoneNumber,
        'work_email'        => $faker->companyEmail,
        'private_email'     => $faker->email,
        'joined_date'       => $faker->date('Y-m-d'),
        'department'        => $faker->title,
    ];
});
