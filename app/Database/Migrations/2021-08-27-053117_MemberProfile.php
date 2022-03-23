<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MemberProfile extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_member' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'nama_member' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'no_telepon' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'nama_rekening' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'nama_bank' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'no_rekening' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'keterangan' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'status_member' => [
				'type' => 'enum',
				'constraint' => array('aktif', 'non aktif', 'suspend'),
				'null' => true
			],
			'foto_ktp' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'fotodiri_ktp' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'foto_profile' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'foto_rekening' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'created_at' => [
				'type' => 'datetime',
				'null' => true
			],
			'updated_at' => [
				'type' => 'datetime',
				'null' => true
			]
		]);
		$this->forge->addKey('id_member', true);
		$this->forge->createTable('member_profile');
	}

	public function down()
	{
		$this->forge->dropTable('member_profile');
	}
}
