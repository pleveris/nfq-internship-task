<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Group::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'project_id' => factory('App\Models\Project')->create()->id,
        'stud_count' => 0,
    ];
});
