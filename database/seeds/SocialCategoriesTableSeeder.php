<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialCategoriesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();

        DB::table('social_categories')->insert([
            [
                'id' => 1,
                'name' => "Agriculteurs exploitants",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 2,
                'name' => "Artisans, commerçants, chefs d'entreprise",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 3,
                'name' => "Cadres, professions intellectuelles supérieures",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 4,
                'name' => "Professions intermédiaires",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 5,
                'name' => "Employés",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 6,
                'name' => "Ouvriers",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 7,
                'name' => "Inactifs ayant déjà travaillé",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 8,
                'name' => "Autres sans activité professionnelle",
                'parent_id' => null,
                'created_at' => $now,
            ],
            [
                'id' => 10,
                'name' => "Agriculteurs sur petite exploitation",
                'parent_id' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 11,
                'name' => "Agriculteurs sur moyenne exploitation",
                'parent_id' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 12,
                'name' => "Agriculteurs sur grande exploitation",
                'parent_id' => 1,
                'created_at' => $now,
            ],
            [
                'id' => 21,
                'name' => "Artisans",
                'parent_id' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 22,
                'name' => "Commerçants et assimilés",
                'parent_id' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 23,
                'name' => "Chefs d'entreprise 10 salariés ou plus",
                'parent_id' => 2,
                'created_at' => $now,
            ],
            [
                'id' => 31,
                'name' => "Professions libérales",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 32,
                'name' => "Cadres de la fonction publique",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 33,
                'name' => "Professeurs, professions scientifiques",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 34,
                'name' => "Profession de l'information, des arts et des spectacles",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 35,
                'name' => "Cadres administratifs et commerciaux d'entreprise",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 36,
                'name' => "Ingénieurs et cadres techniques d'entreprise",
                'parent_id' => 3,
                'created_at' => $now,
            ],
            [
                'id' => 41,
                'name' => "Professeurs des écoles, instituteurs et assimilés",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 42,
                'name' => "Professions intermédiaires de la santé et du travail social",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 43,
                'name' => "Clergé, religieux",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 44,
                'name' => "Professions intermédiaires administratives de la fonction publique",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 45,
                'name' => "Professions intermédiaires administratives et commerciales des entreprises",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 46,
                'name' => "Techniciens",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 47,
                'name' => "Contremaîtres, agents de maîtrise",
                'parent_id' => 4,
                'created_at' => $now,
            ],
            [
                'id' => 51,
                'name' => "Employés civils et agents de service de la fonction publique",
                'parent_id' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 52,
                'name' => "Policiers et militaires",
                'parent_id' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 53,
                'name' => "Employés administratifs d'entreprise",
                'parent_id' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 54,
                'name' => "Employés de commerce",
                'parent_id' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 55,
                'name' => "Personnels des services directs aux particuliers",
                'parent_id' => 5,
                'created_at' => $now,
            ],
            [
                'id' => 61,
                'name' => "Ouvriers qualifiés de type industriel",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 62,
                'name' => "Ouvriers qualifiés de type artisanal",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 63,
                'name' => "Chauffeurs",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 64,
                'name' => "Ouvriers qualifiés de la manutention, du magasinage et du transport",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 65,
                'name' => "Ouvriers non qualifiés de type industriel",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 66,
                'name' => "Ouvriers non qualifiés de type artisanal",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 67,
                'name' => "Ouvriers agricoles",
                'parent_id' => 6,
                'created_at' => $now,
            ],
            [
                'id' => 71,
                'name' => "Anciens agriculteurs exploitants",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 72,
                'name' => "Anciens artisans, commerçants, chefs d'entreprises",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 73,
                'name' => "Anciens cadres",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 74,
                'name' => "Anciennes professions intermédiaires",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 75,
                'name' => "Anciens employés",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 76,
                'name' => "Anciens ouvriers (y compris agricoles)",
                'parent_id' => 7,
                'created_at' => $now,
            ],
            [
                'id' => 81,
                'name' => "Chômeurs n'ayant jamais travaillé",
                'parent_id' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 82,
                'name' => "Élèves ou étudiants",
                'parent_id' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 83,
                'name' => "Personnes diverses sans activité professionnelle de moins de 60 ans",
                'parent_id' => 8,
                'created_at' => $now,
            ],
            [
                'id' => 84,
                'name' => "Personnes diverses sans activité professionnelle de 60 ans ou plus",
                'parent_id' => 8,
                'created_at' => $now,
            ],
        ]);
    }
}
