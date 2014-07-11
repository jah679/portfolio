<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('PostTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = new User();
        $user->email = $_ENV['ADMIN_USER'];
        $user->password = Hash::make('ADMIN_PASS');
        $user->save();
    }

}

class PostTableSeeder extends Seeder {


    public function run()
    {
    	DB::table('posts')->delete();

    	$user = User::first();

        for($i = 1; $i <= 10; $i++) {
        
	        $post = new Post();
	        // $post->user_id = $user->id;
	        $post->user()->associate($user);
	        $post->title = 'title' . "$i";
	        $post->body = 'body' ."$i";
	        $post->save();
	    }
    }
}
