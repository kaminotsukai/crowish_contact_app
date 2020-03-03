<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'avatar' => 'https://avatars0.githubusercontent.com/u/9064066?v=4&s=460',
        'gender' => function() {
            return mt_rand(1,3);
        },
        'phone_number' => $faker->phoneNumber,
        'house_phone_number' => '',
        'email' => $faker->email,
        'address' => $faker->streetAddress,
        'birthday' => $faker->date($format = 'Y-m-d'),
        'memo' => $faker->text,
    ];
});
