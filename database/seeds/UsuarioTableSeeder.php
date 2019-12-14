<?php

use Illuminate\Database\Seeder;
use Faker\Provider\es_ES\Person;
use Faker\Factory;
use App\User;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Factory::create('es_ES');
        for ($i=0; $i < 100; $i++) { 
			User::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'ci' => $faker->dni,
				'username' => $faker->userName,
				'password' => bcrypt('123456')
			]);
        }
    }
}
