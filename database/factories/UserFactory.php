<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'approved' => true,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Experiance::class, function (Faker $faker) {
    return [
        'experiance' => $faker->jobTitle,
    ];
});
$factory->define(App\Guidance::class, function (Faker $faker) {
    return [
        'guidance' => $faker->jobTitle,
    ];
});
$factory->define(App\ImpactNetwork::class, function (Faker $faker) {
    return [
        'Full_Name' => $faker->name,
        'Current_Position' => $faker->country.','.$faker->city,
        'about' => $faker->word($nbSentences = 3, $variableNbSentences = true),
        'personal_image' => $faker->image(public_path('/uploads/impacts')  , 800 , 600 , 'business' , []),
        'Currently_based_on' => $faker->country.','.$faker->city,
    ];
});
$factory->define(App\ImpactNetworksExperiance::class, function (Faker $faker) {
    return [
        'impact_network_id' => App\ImpactNetwork::all()->random()->id,
         'experiance_id' => App\Experiance::all()->random()->id,
    ];
});
$factory->define(App\ImpactNetworksGuidance::class, function (Faker $faker) {
    return [
        'impact_network_id' => App\ImpactNetwork::all()->random()->id,
        'guidance_id' => App\Guidance::all()->random()->id,
    ];
});
$factory->define(App\Application::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->word,
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'image' => $faker->image(public_path('/uploads/applications')  , 800 , 600 , 'business' , []),
    ];
});
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->word,
        'post_type' => $faker->randomElement($array = array ('header', 'our', 'our', 'our', 'our', 'our', 'event', 'event', 'event')),
        'content' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'image' => $faker->image(public_path('/uploads/posts')  , 800 , 600 , 'business' , [])
    ];
});
$factory->define(App\Extramenu::class, function (Faker $faker) {
    return [
        'name' => 'main_menu',
        'position' => 'nav',
    ];
});
$factory->define(App\Menuitem::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'link_type' => $faker->randomElement($array = array ('post', 'application')),
        'extramenu_id' => 1,
        'relative_id'  => $faker->randomElement($array = array (1, 2,3)),
    ];
});