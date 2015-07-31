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

		// $this->call('UsersTableSeeder');
		// $this->call('AlbumsTableSeeder');
		// $this->call('PicturesTableSeeder');	
		// $this->call('TopicsTableSeeder');
		// $this->call('TopicCommentsTableSeeder');
		// $this->call('CommentOfTopiccommentTableSeeder');
		// $this->call('MessagesTableSeeder');
		// $this->call('MessageCommentsTableSeeder');
		// $this->call('CommentOfMsgcommentTableSeeder');
		// $this->call('BackstagesTableSeeder');
		// $this->call('EnlightenColumnsTableSeeder');
		// $this->call('SocietyDynamicsTableSeeder');
		// $this->call('AssociationDynamicsTableSeeder');
		// $this->call('ContactsTableSeeder');
		// $this->call('PostersTableSeeder');
		$this->call('AppreciationsTableSeeder');
		// $this->call('EmploymentsTableSeeder');
		// $this->call('TeachersTableSeeder');
	}

}
