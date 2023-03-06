<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
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
                'id' => 1,
                'code' => 'admin',
                'title' => 'admin',
                'description' => 'Quản trị viên',
            ],
            [
                'id' => 2,
                'code' => 'creator',
                'title' => 'creator',
                'description' => 'Nhà viết creator',
            ],
            [
                'id' => 3,
                'code' => 'guest',
                'title' => 'guest',
                'description' => 'Người dùng',
            ],
        ];
        \Illuminate\Support\Facades\DB::table('groups')->insert($data);
    }
}
