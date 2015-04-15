<?php 

class Migration_Create_users extends CI_Migration {

	public function up()
	{
		
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'group_id'=> array(
				'type'=> 'mediumint',
				'constraint'=> 8,
				'unsigned'=> TRUE,
				'null'=> FALSE			
			),
			'ip_address'=> array(
				'type'=> 'char',
				'constraint'=> 16,
				'null'=> FALSE			
			),
			'username'=> array(
				'type'=> 'varchar',
				'constraint'=> 40,
				'null'=> FALSE
			),
			'salt'=> array(
				'type'=> 'varchar',
				'constraint'=> 40,
				'null'=> TRUE,							
			),
			'email'=> array(
				'type'=> 'varchar',
				'constraint'=> 254,
				'null'=> FALSE							
			),
			'activation_code'=> array(
				'type'=> 'varchar',
				'constraint'=> 40,
				'null'=> TRUE			
			),
			'forgotten_password_code'=> array(
				'type'=> 'varchar',
				'constraint'=> 40,
				'null'=> TRUE							
			),
			'remember_code'=> array(
				'type'=> 'varchar',
				'constraint'=> 40,
				'null'=> TRUE			
			),
			'created_on'=> array(
				'type'=> 'datetime',
				'null'=> TRUE
			),
			'last_login'=> array(
				'type'=> 'datetime',
				'null'=> TRUE
			),
			'active'=> array(
				'type'=> 'tinyint',
				'constraint'=> 1,
				'unsigned'=> TRUE,
				'null'=> TRUE
			)			
		));

		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}