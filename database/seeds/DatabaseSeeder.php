<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->call(SocialCategoriesTableSeeder::class);

        factory(\App\Models\User::class)->create([
            'email' => 'admin@vote-citoyen.fr',
            'password' => 'secret',
            'is_admin' => true,
        ]);

        factory(\App\Models\Poll::class, 4)->state('proposed')->create();
        factory(\App\Models\Poll::class, 3)->state('pending')->create();
        factory(\App\Models\Poll::class, 2)->state('current')->create();
        factory(\App\Models\Poll::class, 1)->state('ended')->create();
    }
}
