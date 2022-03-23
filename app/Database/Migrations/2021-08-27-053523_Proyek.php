<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proyek extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_proyek' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'nama_proyek' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'alamat' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'kota' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'developer' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'lokasi' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'referral' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'pimpro' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'jenis_pks' => [
				'type' => 'enum',
				'constraint' => array('inden', 'ready'),
				'null' => true
			],
			'target_perbulan' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => true
			],
			'siteplan' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'sertifikat' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'pbb' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'mou' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'mou_startDate' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'mou_expDate' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'cloudia' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'persentase' => [
				'type' => 'char',
				'constraint' => 4,
				'null' => true
			],
			'globkomisi' => [
				'type' => 'float',
				'null' => true
			],
			'netkomisi' => [
				'type' => 'char',
				'constraint' => 4,
				'null' => true
			],
			'is_active' => [
				'type' => 'tinyint',
				'constraint' => 11
			],
			'nonzone' => [
				'type' => 'tinyint',
				'constraint' => 11
			]
		]);
		$this->forge->addKey('id_proyek', true);
		$this->forge->createTable('proyek');
	}

	public function down()
	{
		$this->forge->dropTable('proyek');
	}
}
