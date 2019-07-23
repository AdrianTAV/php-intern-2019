<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use App\Company;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    $companies = Company::all()->pluck("id")->toArray();
    $randomKey = array_rand($companies);
    return [
        'company_id' => $companies[$randomKey],
        'name' => $faker->name,
    ];
});
