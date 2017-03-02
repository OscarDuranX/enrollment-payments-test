<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $user = factory(App\User::class)->create([
                    "name" => "Oscar Duran Marti",
                    "email" => "oscarduran@gmail.com",
                    "password" => bcrypt(env('OSCAR_PWD', '123456'))]
            );
            $user->assignRole('admin');
        } catch (\Illuminate\Database\QueryException $exception) {
        }
    }
}
