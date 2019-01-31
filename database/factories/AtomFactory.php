<?php

use Faker\Generator as Faker;

$factory->define(Atomix\Atom::class, function (Faker $faker) {
    return [
    	'user_id' => '1',
        'title' => $faker->title,
        'description' => $faker->text
    ];
});
