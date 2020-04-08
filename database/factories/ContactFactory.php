<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'phone' => $faker->unique()->regexify("\(\d{3}\) \d{3}-\d{2}-\d{2}"),
        'status' => rand(0, 3),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
    ];
});
