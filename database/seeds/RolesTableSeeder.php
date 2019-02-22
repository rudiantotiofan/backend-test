<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::getRoleRepository()->createModel()->create([
			'slug' => 'administrator',
			'name' => 'ADMINISTRATOR',
			'permissions' => [
				'admin'  => true,
                'editor' => true,
                'news'   => true
			],
		]);

        Sentinel::getRoleRepository()->createModel()->create([
            'slug' => 'editor',
            'name' => 'EDITOR',
            'permissions' => [
                'news' => true,
            ],
        ]);
    }
}
