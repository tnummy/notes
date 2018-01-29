<?php

use Carbon\Carbon;

class UserTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('users')->insert([
            [
                'name' => 'Test',
                'email' => 'test@test.com',
                'password' => password_hash('$sh4rpspr1nG$', PASSWORD_DEFAULT),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Tester',
                'email' => 'test@account.com',
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}