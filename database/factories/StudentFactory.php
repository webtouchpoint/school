<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Students\Student::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'aadhaar' => $faker->randomDigit(12),
        'name' => $faker->name,
        'fathers_name' => $faker->name,
        'mothers_name' => $faker->name,
        'date_of_admission' => date('d-m-Y'),
        'dob' => date('d-m-Y'),
        'gender' => $faker->randomElement($array = array ('male','female')),
        'social_category' => 'sc',
        'religion' => 'islam',
        'mother_tongue' => 'bengali',
        'address' => $faker->address,
        'is_bpl' => 0,
        'is_disadvantage_group' => 0,
        'is_getting_free_education' => 0,
        'is_homeless' => 0,
        'mobile' => $faker->randomDigit(10),
        'email' => $faker->unique()->safeEmail,

    ];
});
