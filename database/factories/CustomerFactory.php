<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\User;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return User::all()->random();
        },
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' =>$faker->phoneNumber ,
        'address' =>$faker->address ,
        'type' =>  $faker->randomElement(['individual', 'corporate'])


    ];
});
