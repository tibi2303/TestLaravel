<?php

use Illuminate\Database\Seeder;
use App\User;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $roles = [
                0 => 'admin',
                1 => 'user',
                2 => 'guest'
            ];
            $emails = [
                0 => 'admin',
                1 => 'user',
                2 => 'guest',
                3 => 'john',
                4 => 'anne',
                5 => 'andrew',
            ];
            $names = [
                0 => 'admin',
                1 => 'user',
                2 => 'guest',
                3 => 'john',
                4 => 'anne',
                5 => 'andrew',
            ];
            for ($i=1; $i < 101; $i++) {
                $users[] = [
                        'id' => $i,
                        'name' => $names[rand(0,5)],
                        'role' => $roles[rand(0,2)],
                        'email' => $emails[rand(0,5)] . str_random(2).'@gmail.com'
                    ];
            };
    		foreach ($users as $user) {
    			$createUser = User::firstOrCreate(['id'=>$user['id']]);
    			$createUser->update($user);
    		}
    }
}
