<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task_detail;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Task_detail::class, function (Faker $faker) {
    return [
        //
        'task_id' => rand(1,21),
        'title' => $faker->sentence(5),
        'status' => 'new task',
    ];
});
