<?php
class Migration_Create_announcements extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'message'=> array(
				'type'=> 'MEDIUMTEXT',
				'null'=> TRUE			
			),
			'photo'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 250,
				'null'=> TRUE							
			),
			'twitter'=> array(			
				'type'=> 'INT',
				'constraint'=> 2,
				'null'=> TRUE
			),
			'sms'=> array(
				'type'=> 'INT',
				'constraint'=> 2,
				'null'=> TRUE							
			),
			'fb'=> array(
				'type'=> 'INT',
				'contraint'=> 2,
				'null'=> TRUE			
			),
			'createdon'=> array(
				'type'=> 'DATETIME',
				'null'=> TRUE			
			),
			'updatedon'=> array(
				'type'=> 'TIMESTAMP',				
			)					
		));
		
		$this->dbforge->create_table('announcements');
	
	}
	
	
	public function down()
	{
		$this->dbforge->drop_table('announcements');
		
	}
}