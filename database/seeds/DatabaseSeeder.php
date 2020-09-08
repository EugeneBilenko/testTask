<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $translations = factory(App\Translation::class, 200)->create();
        $terms = factory(App\Term::class, 50)->create()->each(function ($term) use ($translations) {
            $term->translations()->saveMany($translations->random(rand(0, 10)));
        });

        $dictionaries = factory(App\Dictionary::class, 3)->create();
        $termCounter = 49;
        $dictionariesCounter = 0;
        while ($terms->isNotEmpty()) {
            $term = $terms->pull(rand(0,$termCounter--));
            $terms = $terms->values();
            if ($dictionariesCounter > 2)
                $dictionariesCounter = 0;
            $dictionaries[$dictionariesCounter++]->terms()->save($term);
        }
    }
}
