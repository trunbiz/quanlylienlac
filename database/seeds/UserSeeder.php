<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'group_id' => 1,
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'lever' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'group_id' => 3,
                'email' => 'guest@gmail.com',
                'username' => 'người dùng thử',
                'lever' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'group_id' => 2,
                'email' => 'creator@gmail.com',
                'username' => 'creator',
                'lever' => 0,
                'password' => bcrypt('123456'),
            ],

        ];
        DB::table('users')->insert($data);
    }
}
