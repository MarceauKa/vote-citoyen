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

        factory(\App\Models\Poll::class, 1)->state('proposed')->create([
            'name' => "Doit-il y avoir une taxe sur le kérosène ?"
        ]);

        factory(\App\Models\Poll::class, 1)->state('proposed')->create([
            'name' => "Etes-vous pour la légalisation du cannabis ?"
        ]);

        factory(\App\Models\Poll::class, 1)->state('pending')->create([
            'name' => "Le SMIC doit-il être fixé à 1500 € net ?",
        ]);

        factory(\App\Models\Poll::class, 1)->state('current')->create([
            'name' => "Etes-vous pour ou contre le référendum d'initiative citoyenne ?",
        ]);
    }
}
