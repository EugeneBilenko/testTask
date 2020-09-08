<?php

use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dictionary::class, 3)->create()->each(function($dictionary) {
            $dictionary->terms()->saveMany(
                factory(App\Term::class, 50)->create(['dictionary_id' => $dictionary->id])->each(function($term) {
                    $term->translations()->saveMany(
                        factory(App\Translation::class, rand(0,10))->create(['term_id' => $term->id])
                    );
                })
            );
        });
    }
}
