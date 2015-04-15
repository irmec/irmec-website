<?php

class Migration_Create_workers extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'lastname'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=>TRUE
			),
			'firstname'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=>TRUE
			),
			'middlename'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=>TRUE
			),
			'gender'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=>TRUE
			),
			'dob'=> array(
				'type'=>'DATE',
				'null'=> TRUE
			),
			'phone'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> TRUE
			),
			'type'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> TRUE
			),
			'status'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE
				
			),
			'notes'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 254,
				'null'=> TRUE
			),
			'photo'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 200,
				'null'=> TRUE
			),
			'insertedon'=> array(
				'type'=> 'DATE',
				'null'=> TRUE
			),
			'updatedon'=> array(
				'type'=> 'TIMESTAMP'
			)		
		));
		
		$this->dbforge->create_table('workers');
	
	}	
	
	public function down()
	{
		$this->dbforge->drop_table('workers');		
	}
}