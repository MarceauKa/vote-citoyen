<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)
            ->create([
                'email' => 'admin@vote-citoyen.fr',
                'password' => 'secret',
                'is_admin' => true,
            ]);

        factory(\App\Models\User::class, 10)
            ->create();
    }
}
