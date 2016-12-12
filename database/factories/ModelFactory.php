<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'rut' 		=> $faker->ean8,
        'name'		=> $faker->company,
        'address' 	=> $faker->address, 
        'locality' 	=> $faker->randomElement( $array = array('Montevideo', 'Maldonado', 'Canelones') )
    ];
});

$factory->define(App\Bill::class, function (Faker\Generator $faker) {
	$billItem_example = [
		array(
			'code' => 123,
			'amount' => 2,
			'price' => 66,
			'description' => 'Lorem Ipsum bla bla bla, awesome!!',
		),
		array(
			'code' => 321,
			'amount' => 1,
			'price' => 33,
			'description' => 'Lorem Ipsum bla bla bla, awesome!!',
		)
	];

    return [
        'bill_number' 	 => $faker->ean13,
        'bill_type' 	 => $faker->randomElement( $array = array('type_1', 'type_2') ),
        'buyer_name' 	 => $faker->company,
        'buyer_rut' 	 => $faker->ean8,
        'buyer_address'  => $faker->address,
        'buyer_locality' => $faker->randomElement( $array = array('Montevideo', 'Maldonado', 'Canelones') ),
        'final_consumer' => $faker->numberBetween(0,1),
        'bill_items' 	 => json_encode($billItem_example),
        'currency' 	 	 => $faker->randomElement( $array = array('USD', 'UYU') ),
        'sub_total' 	 => $faker->numberBetween(1,1000),
        'taxes' 		 => $faker->numberBetween(1,1000),
        'total' 		 => $faker->numberBetween(1,1000)
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
    return [
        'rut' 		=> $faker->ean8,
        'name'		=> $faker->company,
        'address' 	=> $faker->address, 
        'locality' 	=> $faker->randomElement( $array = array('Montevideo', 'Maldonado', 'Canelones') )
    ];
});
