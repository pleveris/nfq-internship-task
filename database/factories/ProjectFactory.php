<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'numGroups' => 3,
        'numStudentsInEach' => 3,
        'studentsTotal' => 3
    ];
});
