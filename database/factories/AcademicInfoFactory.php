<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Students\AcademicInfo::class, function (Faker $faker) {
    return [
        'user_id' => 1,
    	'student_id' => function() {
    		return factory('App\Models\Students\Student')->create()->id;
    	}, 
        'school_session_id' => 1,
        'school_class_id' => $faker->randomElement($array = array (1,2)),
        'section_id' => 1,
        'roll_number' => $faker->unique()->randomDigit
    ];
});
