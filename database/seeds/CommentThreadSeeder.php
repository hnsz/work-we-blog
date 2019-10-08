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
            
            $starter = App\Post::find(1)->threadStarter()->create();
            
            $thread = $starter->commentThread()->create(['thread_starter_id' => $starter]);
            
                $user = App\User::find(2);
                $init_list =[
                    'body' => "hello nice story",
                    'minor_title' => 'none',
                    'comment_thread_id' => $thread->id
                    ];    
                $comment = $user->comments()->create($init_list);
                // $comment->user=$user;
                $comment->commentThread()->associate($thread);
                
                $starter->save();
                $thread->save();
                $user->save();
                $comment->save();

                $generator = \Faker\Factory::create();
                $populator = \Faker\ORM\Propel\Populator($generator);
                $populator->addEntity()
    }
}

# comment_threads
# | id                | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
# | created_at        | timestamp           | YES  |     | NULL    |                |
# | updated_at        | timestamp           | YES  |     | NULL    |                |
# | thread_starter_id | bigint(20) unsigned | NO   | MUL | NULL    |                |
# 
# comments;
# | id                | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
# | comment_thread_id | bigint(20) unsigned | NO   | MUL | NULL    |                |
# | user_id           | bigint(20) unsigned | NO   | MUL | NULL    |                |
# | minor_title       | varchar(25)         | NO   |     | NULL    |                |
# | body              | text                | NO   |     | NULL    |                |
# | created_at        | timestamp           | YES  |     | NULL    |                |
# | updated_at        | timestamp           | YES  |     | NULL    |                |
# | deleted_at        | timestamp           | YES  |     | NULL    |                |
# 
# 
# posts;
# | id           | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
# | user_id      | bigint(20) unsigned | NO   | MUL | NULL    |                |
# | title        | varchar(200)        | NO   |     | NULL    |                |
# | body         | text                | NO   |     | NULL    |                |
# | published_at | datetime            | YES  |     | NULL    |                |
# | created_at   | timestamp           | YES  |     | NULL    |                |
# | updated_at   | timestamp           | YES  |     | NULL    |                |
# | deleted_at   | timestamp           | YES  |     | NULL    |                |
# 
# users;
# | id                | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
# | name              | varchar(255)        | NO   |     | NULL    |                |
# | email             | varchar(255)        | NO   | UNI | NULL    |                |
# | email_verified_at | timestamp           | YES  |     | NULL    |                |
# | password          | varchar(255)        | NO   |     | NULL    |                |
# | remember_token    | varchar(100)        | YES  |     | NULL    |                |
# | created_at        | timestamp           | YES  |     | NULL    |                |
# | updated_at        | timestamp           | YES  |     | NULL    |                |
# 
# 
# thread_starters;
# | id             | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
# | replyable_type | varchar(255)        | NO   | MUL | NULL    |                |
# | replyable_id   | bigint(20) unsigned | NO   |     | NULL    |                |
# | created_at     | timestamp           | YES  |     | NULL    |                |
# | updated_at     | timestamp           | YES  |     | NULL    |                |
