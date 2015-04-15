<?php
class Migration_Create_churches extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field('id');
		$this->dbforge->add_field(array(
			'name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 250,
				'null'=> TRUE				
			),
			'address'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 250,
				'null'=> TRUE				
			),
			'town_id'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 11,
				'null'=> TRUE			
			),
			'zip_code'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 10,
				'null'=> TRUE			
			),
			'anniversary_month'=> array(
				'type'=> 'INT',
				'constraint'=> 11,
				'null'=> TRUE				
			),
			'anniversary_week'=> array(
				'type'=> 'INT',
				'constraint'=> 11,
				'null'=> TRUE			
			),
			'photo'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 254,
				'null'=> TRUE
			),
			'latlang'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 254,
				'null'=> TRUE			
			),
			'map'=> array(
				'type'=> 'MEDIUMTEXT',
				'null'=> TRUE				
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
				
		$this->dbforge->create_table('churches');
	}
	
	public function down()
	{
		$this->dbforge->drop_table('churches');
		
	}
}