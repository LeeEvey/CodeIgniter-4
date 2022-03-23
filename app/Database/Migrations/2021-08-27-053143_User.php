<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_member' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'role' => [
				'type' => 'enum',
				'constraint' => array('admin', 'super admin', 'member'),
				'null' => true
			]
		]);
		$this->forge->addKey('id_member', true);
		$this->forge->createTable('user');
	}

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
