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
        $this->call(UsersTableSeeder::class);
    }
}
