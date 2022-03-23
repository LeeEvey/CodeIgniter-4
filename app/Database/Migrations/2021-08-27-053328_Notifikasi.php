<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notifikasi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_notifikasi' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_member' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'isi_notif' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'status' => [
				'type' => 'enum',
				'constraint' => array('dibaca', 'belum dibaca'),
				'null' => true
			]
		]);
		$this->forge->addKey('id_notifikasi', true);
		$this->forge->createTable('notifikasi');
		$this->forge->addForeignKey('id_member', 'member_profile', 'id_member');
	}

	public function down()
	{
		$this->forge->dropTable('notifikasi');
	}
}
