<?php
namespace App\Kopassus\Modules\AdminSeller\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminSellerDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('App\Kopassus\Modules\AdminSeller\Database\Seeds\FoobarTableSeeder');
	}

}
