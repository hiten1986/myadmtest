<?php
namespace App\Kopassus\Modules\AdminBuyer\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminBuyerDatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('App\Kopassus\Modules\AdminBuyer\Database\Seeds\FoobarTableSeeder');
	}

}
