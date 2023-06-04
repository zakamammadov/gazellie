<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Backend\UserDetal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        UserDetal::truncate();

        $user_admin = User::create([
            'name'     => 'Zaka Mammadov',
            'email'       => 'zakamammadov18@gmail.com',
            'password'       => bcrypt('102030'),
            'is_active'    => 1,
            'is_admin' => 1
        ]);
        $user_admin->detail()->create([
            'adress'       => 'Baku',
            'phone'     => '(312) 444 55 66',
            'mob_phone' => '(555) 444 55 66'
        ]);

        for ($i = 0; $i < 50; $i++) {
            $user_customer = User::create([
                'name'     => $faker->name,
                'email'       => $faker->unique()->safeEmail,
                'password'       => bcrypt('102030'),
                'is_active'    => 1,
                'is_admin' => 0
            ]);

            $user_customer->detay()->create([
                'adress'       => $faker->address,
                'phone'     => $faker->e164PhoneNumber,
                'mob_phone' => $faker->e164PhoneNumber
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
