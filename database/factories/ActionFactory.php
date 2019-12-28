<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Action;
use App\Customer;
use App\User;
use Faker\Generator as Faker;

$factory->define(Action::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return User::all()->random();
        },
      'customer_id' => function(){
            return Customer::all()->random();
        },
        
        'action' =>  $faker->randomElement(['call', 'visit'])


    ];
});
