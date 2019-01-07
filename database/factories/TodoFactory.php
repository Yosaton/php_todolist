<?php

use Faker\Generator as Faker;
use App\Todo;


$factory->define(Todo::class, function (Faker $faker) {
    return [
      "title" => $faker->sentence(),
    ];
});