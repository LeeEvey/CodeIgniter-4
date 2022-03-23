<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komisi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_komisi' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_penjualan' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'id_member' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'id_prospek' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'komisi' => [
				'type' => 'double',
				'null' => true
			],
			'total_komisi' => [
				'type' => 'double',
				'null' => true
			],
			'keterangan' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'status_pencairan' => [
				'type' => 'enum',
				'constraint' => array('cair', 'belum cair'),
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
		$this->forge->addKey('id_komisi', true);
		$this->forge->createTable('komisi');
		$this->forge->addForeignKey('id_penjualan', 'penjualan', 'id_penjualan');
		$this->forge->addForeignKey('id_member', 'member_profile', 'id_member');
		$this->forge->addForeignKey('id_prospek', 'prospek', 'id_prospek');
	}

	public function down()
	{
		$this->forge->dropTable('komisi');
	}
}
