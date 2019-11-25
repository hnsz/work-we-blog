<?php



use Illuminate\Database\Seeder;
use \App\Contracts\SeedDataProvider;
use Carbon\Carbon;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(SeedDataProvider $provider)
    {
        $this->runOnce ();
        $users = $provider->get();


        foreach($users as $user) {
            DB::table('users')->insert($user);
        }
    }
    public function runOnce () {
        $result = DB::select('select * from users where name =?', ["hns"]);
        
        if(empty($result))  {
            DB::table('users')->insert([
                'name' => 'hns',
                'email' => 'hansrudolfw@gmail.com',
                'password' => Hash::make('welkom01'),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
