<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('fr_FR');

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'gender' => $faker->randomElement(\App\Models\User::getGendersList()),
        'birthdate' => $faker->date('d/m/Y', '-20 years'),
        'postcode' => $faker->regexify('[1-9]{2}[0-5]{1}[0-4]{1}0'),
        'social_category_id' => \App\Models\SocialCategory::select('id')->inRandomOrder()->isChildCategory()->first()->id,
        'is_admin' => false,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'secret',
        'remember_token' => str_random(10),
    ];
});
