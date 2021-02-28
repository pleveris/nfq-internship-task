<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'project_id' => factory('App\Models\Project')->create()->id,
        'group_id' => factory('App\Models\Group')->create()->id
    ];
});
