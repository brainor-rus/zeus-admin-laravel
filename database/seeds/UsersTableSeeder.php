<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 10)->create()->each(function ($user) {
            $user->roles()->save(factory(\App\Models\Role::class)->make());

            $city = factory(\App\Models\City::class)->make();
            $city->save();

            $user->city()->associate($city);
            $user->save();

            for($i = 0; $i < 5; $i++) {
                $user->contacts()->save(factory(\App\Models\Contact::class)->make());
            }
        });
    }
}
