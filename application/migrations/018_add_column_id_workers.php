<?php

class Migration_Add_Column_ID_Workers extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_column('workers',
			array(
				'processed'=> array('type'=> 'INT','null'=>TRUE)
			)
		);
		
	}
	
	
	public function down()
	{
		$this->dbforge->drop_column('workers','processed');
		
		
	}
	
}
