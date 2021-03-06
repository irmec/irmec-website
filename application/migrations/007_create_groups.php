<?php
class Migration_Create_groups extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 20,
				'null'=> FALSE			
			),
			'description'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 100,
				'null'=> FALSE			
			)
		));
		
		$this->dbforge->create_table('groups');
		$this->db->query("INSERT INTO `groups` (`id`, `name`, `description`) VALUES
			(1, 'admin', 'Administrator');");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('groups');
		
	}
}