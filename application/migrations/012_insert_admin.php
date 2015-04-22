<?php


class Migration_Insert_admin extends CI_Migration {

	public function up()
	{
		$this->db->query("INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
			(1, 1, '127.0.0.1', 'administrator', '901e2503a16d553d32332a40deda4d950a038721', '9462e8eee0', 'admin@irmevangelicalchurch.org', '', NULL, '', '0000-00-00 00:00:00', 1429617562, 1);");
											
	}
	
	public function down()
	{		
		$this->db->query("DELETE FROM `users` WHERE `id`=1");
	}
}