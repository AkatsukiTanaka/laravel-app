<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
          [
            'name'      => 'admin',
            'email'     => 'admin@example.com',
            'password'  => Hash::make('password'),
            'admin_fig' => true,
          ],
          [
            'name'      => 'test0001',
            'email'     => 'test0001@example.com',
            'password'  => Hash::make('password'),
            'admin_fig' => false,
          ],
        ];

        // 登録
        foreach ($users as $user) {
          User::create($user);
        }
    }
}
