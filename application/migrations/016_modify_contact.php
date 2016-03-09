<?php

class Migration_Modify_Contact extends CI_Migration
{
	public function up()
	{
		$this->dbforge->modify_column('contact',
			array(
				'message'=> array('type'=> 'TEXT')
			)
		);
	}
	
	public function down()
	{
		$this->dbforge->modify_column('contact',
			array(
				'message'=> array('type'=> 'VARCHAR', 'constraint'=>500)
			)
		);				
	}
}
