<?php
class Migration_Create_meta extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'user_id'=> array(
				'type'=> 'MEDIUMINT',
				'constraint'=> 8,
				'null'=> FALSE
			),
			'first_name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'null'=> FALSE			
			),
			'last_name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 50,
				'null'=> FALSE			
			),
			'company'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> TRUE				
			),
			'phone'=> array(
				'type'=> 'VARCHAR',
				'constraint'=>20,
				'null'=> TRUE
			)					
		));
		
		$this->dbforge->create_table('meta');		
	}
	
	public function down()
	{
		$this->dbforge->drop_table('meta');		
	}
}