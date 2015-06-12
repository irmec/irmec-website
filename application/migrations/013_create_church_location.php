<?php
class Migration_Create_church_location extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		$this->dbforge->add_field(array(
			'longitude'=> array(
				'type'=> 'INT',
				'constraint'=> 11,
				'null'=> TRUE				
			),
			'latitude'=> array(
				'type'=> 'INT',
				'constraint'=> 11,
				'null'=> TRUE				
			
			)				
		));
				
		$this->dbforge->create_table('church_location');
	}
	
	public function down()
	{
		$this->dbforge->drop_table('church_location');
		
	}
}