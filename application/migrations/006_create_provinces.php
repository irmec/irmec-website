<?php
class Migration_Create_provinces extends CI_Migration {
	
	public function up()
	{
		$this->dbforge->add_field('id');
		
		$this->dbforge->add_field(array(
			'name'=> array(
				'type'=> 'VARCHAR',
				'constraint'=> 300,
				'null'=> FALSE			
			)
		));
		
		$this->dbforge->create_table('provinces');
		
		$this->db->query("INSERT INTO `provinces` (`id`, `name`) VALUES
				(1, 'Abra'),
				(2, 'Agusan del Norte'),
				(3, 'Agusan del Sur'),
				(4, 'Aklan'),
				(5, 'Albay'),
				(6, 'Antique'),
				(7, 'Apayao'),
				(8, 'Aurora'),
				(9, 'Basilan'),
				(10, 'Bataan'),
				(11, 'Batanes'),
				(12, 'Batangas'),
				(13, 'Benguet'),
				(14, 'Biliran'),
				(15, 'Bohol'),
				(16, 'Bukidnon'),
				(17, 'Bulacan'),
				(18, 'Cagayan'),
				(19, 'Camarines Norte'),
				(20, 'Camarines Sur'),
				(21, 'Camiguin'),
				(22, 'Capiz'),
				(23, 'Catanduanes'),
				(24, 'Cavite'),
				(25, 'Cebu'),
				(26, 'Compostela Valley'),
				(27, 'Cotabato'),
				(28, 'Davao del Norte'),
				(29, 'Davao del Sur'),
				(30, 'Davao Oriental'),
				(31, 'Eastern Samar'),
				(32, 'Guimaras'),
				(33, 'Ifugao'),
				(34, 'Ilocos Norte'),
				(35, 'Ilocos Sur'),
				(36, 'Iloilo'),
				(37, 'Isabela'),
				(38, 'Kalinga'),
				(39, 'La Union'),
				(40, 'Laguna'),
				(41, 'Lanao del Norte'),
				(42, 'Lanao del Sur'),
				(43, 'Leyte'),
				(44, 'Maguindanao'),
				(45, 'Marinduque'),
				(46, 'Masbate'),
				(47, 'Metro Manila'),
				(48, 'Misamis Occidental'),
				(49, 'Misamis Oriental'),
				(50, 'Mountain Province'),
				(51, 'Negros Occidental'),
				(52, 'Negros Oriental'),
				(53, 'Northern Samar'),
				(54, 'Nueva Ecija'),
				(55, 'Nueva Vizcaya'),
				(56, 'Occidental Mindoro'),
				(57, 'Oriental Mindoro'),
				(58, 'Palawan'),
				(59, 'Pampanga'),
				(60, 'Pangasinan'),
				(61, 'Quezon'),
				(62, 'Quirino'),
				(63, 'Rizal'),
				(64, 'Romblon'),
				(65, 'Samar'),
				(66, 'Sarangani'),
				(67, 'Siquijor'),
				(68, 'Sorsogon'),
				(69, 'South Cotabato'),
				(70, 'Southern Leyte'),
				(71, 'Sultan Kudarat'),
				(72, 'Sulu'),
				(73, 'Surigao del Norte'),
				(74, 'Surigao del Sur'),
				(75, 'Tarlac'),
				(76, 'Tawi-Tawi'),
				(77, 'Zambales'),
				(78, 'Zamboanga del Norte'),
				(79, 'Zamboanga del Sur'),
				(80, 'Zamboanga Sibugay');");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('provinces');
		
	}
}