<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'website' => $faker->domainName,
        'email' => $faker->email,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
