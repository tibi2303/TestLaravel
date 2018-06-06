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
            for ($i=1; $i < 11; $i++) {
                $users[] = [
                        'id' => $i,
                        'name' => str_random(10),
                        'role' => $roles[rand(0,2)],
                        'email' => str_random(10).'@gmail.com'
                    ];
            };
    		foreach ($users as $user) {
    			$createUser = User::firstOrCreate(['id'=>$user['id']]);
    			$createUser->update($user);
    		}
    }
}
