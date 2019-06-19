<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Contact::class, function (Faker $faker) {
    $type = \App\Models\Type::where('class', 'ContactType')->get()->random(1)->first();

    return [
        'type_id' => $type->id,
        'value' => $type->slug === 'telefon' ? $faker->phoneNumber : $faker->email,
    ];
});
