<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(scool\enrollment_payments\Model\Study::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'law_id' => factory(scool\enrollment_payments\Model\Law::class)->create()->id
    ];
});