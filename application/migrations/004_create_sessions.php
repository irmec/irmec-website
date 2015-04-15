<?php
class Migration_Create_sessions extends CI_Migration {
	
	public function up()
	{
		
		
		$this->dbforge->add_field(array(
			'session_id'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 40,
				'null'=> FALSE,
				'default'=> 0			
			),
			'ip_address'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 16,
				'null'=> FALSE,
				
			),
			'user_agent'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 120,			
				'null'=> FALSE
			),
			'last_activity'=> array(
				'type'=> 'INT',
				'constraint'=> 10,
				'null'=> FALSE			
			),
			'user_data'=> array(
				'type'=> 'TEXT',
				'null'=> FALSE				
			)
		));
		
		$this->dbforge->create_table('sessions');
		
	}
	
	public function down()
	{
		
		$this->dbforge->drop_table('sessions');
	}
}