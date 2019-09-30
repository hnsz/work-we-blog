<?php

use Illuminate\Database\Seeder;

class CommentThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cthread = App\Post::find(1)->CommentThread()->create();
        $cthread->save();
    }
}
