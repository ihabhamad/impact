<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class,3)->create();
        factory(\App\Experiance::class,30)->create();
        factory(\App\Guidance::class,30)->create();
        factory(\App\ImpactNetwork::class,20)->create();
        factory(\App\ImpactNetworksGuidance::class,50)->create();
        factory(\App\ImpactNetworksExperiance::class,50)->create();
        factory(\App\Application::class,3)->create();
        factory(\App\Post::class,8)->create();
        factory(\App\Extramenu::class,1)->create();
        factory(\App\Menuitem::class,5)->create();
    }
}
