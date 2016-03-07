<?php 

class Migration_Create_Workers_Family extends CI_Migration {

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
			'fathers_name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=>30,
				'null'=> TRUE
			),
			'fathers_province'=>array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE
			),
			'mothers_name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE			
			),
			'mothers_province'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE			
			),
			'spouse_name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE			
			),
			'spouse_dob'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 20,
				'null'=> TRUE			
			),
			'children'=>array(
				'type'=> 'TEXT',
				'null'=> TRUE
			),
			'wedding_dow'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 20,
				'null'=> TRUE							
			),
			'spouse_occupation'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE
			),
			'present_address'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'null'=> TRUE			
			),
			'notify_person'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 30,
				'null'=> TRUE,
			),
			'notify_address'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'null'=> TRUE			
			),
			'notify_phone'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 20,
				'null'=> TRUE		
			)					
		));
		
		$this->dbforge->create_table('workers_families');
				
				
	}
	
	public function down()
	{
		$this->dbforge->drop_table('workers_families');
		
	}
}
