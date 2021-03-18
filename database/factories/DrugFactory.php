<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Drug;
use Faker\Generator as Faker;

$factory->define(Drug::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'type' => 'HardDrug'
    ];
});
