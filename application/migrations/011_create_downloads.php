<?php

class Migration_Create_downloads extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> FALSE
			),
			'description'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 255,
				'null'=> TRUE			
			),
			'file'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> FALSE			
			),
			'createdon'=> array(
				'type'=> 'DATETIME',
				'null'=> TRUE			
			),
			'updatedon'=> array(
				'type'=> 'TIMESTAMP',				
				'null'=> TRUE			
			)
		));
		
		$this->dbforge->create_table('downloads');
		
	}
	
	public function down()
	{
		$this->dbforge->drop_table('downloads');
		
	}
}
	
	
	