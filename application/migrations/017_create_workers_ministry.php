<?php

class Migration_Create_Workers_Ministry extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'workers_id'=> array(
				'type'=> 'mediumint',
				'constraint'=> 8,
				'unsigned'=> TRUE,
				'null'=> FALSE			
				),
			'volunteer_from'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE				
				),
			'volunteer_to'=>array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE					
				),
			'probationary_from'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE				
				),
			'probationary_to'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE				
				),
			'ordained_from'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE				
				),
			'ordained_to'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE				
				)									
			)
		);
		
			
		$this->dbforge->create_table('workers_ministries');

	}
	
	public function down()
	{
		$this->dbforge->drop_table('workers_ministries');
		
	}
}
