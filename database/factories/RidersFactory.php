<?php


use Faker\Generator as Faker;


/*

|--------------------------------------------------------------------------

| Model Factories

|--------------------------------------------------------------------------

|

| This directory should contain each of the model factory definitions for

| your application. Factories provide a convenient way to generate new

| model instances for testing / seeding your application's database.

|

*/


$factory->define(App\Riders::class, function (Faker $faker) {

    static $password;

    return [

        'full_name' => $faker->name,

        'email' => $faker->unique()->safeEmail,

        'vehicle_model' =>  $faker->lexify(),                           

        'license_number' => $faker->lexify()

    ];

});
