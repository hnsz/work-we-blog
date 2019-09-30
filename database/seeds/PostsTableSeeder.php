<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $dummy = [
            [   'title' => "Script Gaat Verhuizen.",
                'body' => 'Hallo jongens en meisjes. Goed nieuws. We gaan naar een mooie nieuwe locatie. 
            We heb dan veel meer ruimte . Een hele verdieping.',
                'published_at' => $now
                ],
            [   'title' => "Voortaan iedere vrijdag BBQ",
                'body' => "Op de parkeerplaats. Lekker BBQ op kosten van de zaak, en medewerkers van TKP versieren.",
                'published_at' => $now
                ],
            [   'title' => 'Nieuwe sponsor Hooghoudt',
                'body' => 'We hebben een nieuwe sponsor! Onze overburen, Hooghoudt gaan voortaan iedere week een pallet \
                schnapps shotjes afleveren',
                'published_at' => $now
                ]
        ];

        foreach($dummy as $data) {
            $initlist = $data;
            
            $post = App\User::find(1)->posts()->create($initlist);

                    
            
            

            $post->save();
        }
        $this->call(CommentThreadSeeder::class);
    }
}
