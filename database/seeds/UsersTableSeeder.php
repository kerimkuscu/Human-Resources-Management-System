<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $model = User::create([
            'name'      => 'Kerim Kuşcu',
            'email'     => 'kerimkuscu95@gmail.com',
            'password'  => Hash::make('123456'),
            'api_token' => str_random(60),
        ]);

        $model->profile()->create([
            'employee_no' => 1,
            'id_no'       => '37574065692',
            'phone'       => '12345678910',
            'email'       => 'kerimkuscu95@gmail.com',
            'started_at'  => '2013-03-05',
        ]);
    }
}
