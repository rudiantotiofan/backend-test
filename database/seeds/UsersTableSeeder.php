<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Slug list of roles.
	 *
	 * @var array
	 */
	protected $roleSlugsArray = [
		'administrator'
	];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
		DB::table('activations')->truncate();
		DB::table('persistences')->truncate();
		DB::table('reminders')->truncate();
		DB::table('throttle')->truncate();

		$user = Sentinel::registerAndActivate([
			'email' => 'admin@system.com',
			'password' => User::DEFAULT_PASSWORD,
			'first_name' => 'Administrator',
			'last_name' => '',
			'username' => 'administrator',
		]);

		Sentinel::findRoleBySlug('administrator')->users()->attach(Sentinel::findById($user->id));
    }
}
