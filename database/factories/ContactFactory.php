<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'fname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'votes' => rand(101, 999),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
