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

		// $this->call('EnlightenColumnsTableSeeder');
		// $this->call('BackstagesTableSeeder');
		// $this->call('ContactsTableSeeder');
		// $this->call('PostersTableSeeder');
		// $this->call('AppreciationsTableSeeder');
		// $this->call('AssociationDynamicsTableSeeder');
		// $this->call('EmploymentsTableSeeder');
		// $this->call('SocietyDynamicsTableSeeder');
		// $this->call('TeachersTableSeeder');
		// $this->call('AlbumsTableSeeder');
		// $this->call('TopicsTableSeeder');
		$this->call('PicturesTableSeeder');



		
	}

}
