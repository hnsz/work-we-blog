<?php

use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dummy = [
            ["Script Gaat Verhuizen.",
            'Hallo jongens en meisjes. Goed nieuws. We gaan naar een mooie nieuwe locatie. 
            We heb dan veel meer ruimte. Een hele verdieping.'
                ],
            ["Voortaan iedere vrijdag BBQ",
            "Op de parkeerplaats. Lekker BBQ op kosten van de zaak, en medewerkers van TKP versieren."
                ],
            ['Nieuwe sponsor Hooghoudt',
                'We hebben een nieuwe sponsor! Onze overburen, Hooghoudt gaan voortaan iedere week een pallet \
                schnapps shotjes afleveren']
        ];

        foreach($dummy as $data) {
            $post = App\User::find(1)->posts->create();
            //new \App\Post();

            $post->title = $data[0];
            $post->body = $data[1];
            $post->published_at = new \DateTime();

            $post->save();
        }

    }
}
