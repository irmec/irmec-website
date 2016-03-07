<?php

class Migration_Modify_Workers extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_column('workers',
			array(
				'nickname'=>array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
					
				
				),
				'place_birth'=>array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				
				),
				'height'=>array(
					'type'=> 'VARCHAR',
					'constraint'=> 10,
					'null'=> FALSE
				
				),
				'weight'=> array(
					'type'=> 'VARCHAR',
					'constraint'=> 10,
					'null'=> FALSE
				
				),
				'email'=> array(
					'type'=> 'VARCHAR',
					'constraint'=> 40,
					'null'=> FALSE
				
				),
				'cell_phone' => array(
					'type'=> 'VARCHAR',
					'constraint'=> 20,
					'null'=> FALSE
				
				),
				'passport' => array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				),
				'sss'=> array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				
				),
				'philhealth' => array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				),
				'tin'=> array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				
				),
				'permanent_address'=> array(
					'type'=> 'VARCHAR',
					'constraint'=> 150,
					'null'=> FALSE
				),
				'photo_signature'=>array(
					'type'=> 'VARCHAR',
					'constraint'=> 30,
					'null'=> FALSE
				)									
			)
		);
		
		
	}
	
	
	public function down()
	{
		$this->dbforge->drop_column('workers','nickname');
		$this->dbforge->drop_column('workers','place_birth');
		$this->dbforge->drop_column('workers','height');
		$this->dbforge->drop_column('workers','weight');
		$this->dbforge->drop_column('workers','email');
		$this->dbforge->drop_column('workers','cell_phone');
		$this->dbforge->drop_column('workers','passport');
		$this->dbforge->drop_column('workers','sss');
		$this->dbforge->drop_column('workers','philhealth');
		$this->dbforge->drop_column('workers','tin');
		$this->dbforge->drop_column('workers','permanent_address');
		$this->dbforge->drop_column('workers','photo_signature');
	}
	
	
}
