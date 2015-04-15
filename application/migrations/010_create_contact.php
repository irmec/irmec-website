<?php
class Migration_Create_contact extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'email'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 32,
				'null'=> FALSE				
			),
			'subject'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'null'=> FALSE			
			),
			'message'=> array(
				'type'=> 'MEDIUMTEXT',
				'null'=> FALSE			
			),
			'createdon'=> array(
				'type'=> 'DATETIME',
				'null'=> TRUE			
			),
			'updatedon'=> array(
				'type'=> 'TIMESTAMP',
				
			)	
		));
		
		$this->dbforge->create_table('contact');
		
		
	}
	
	public function down()
	{
		$this->dbforge->drop_table('contact');	
	}
}