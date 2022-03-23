<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Prospek extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_prospek' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_proyek' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'nama_customer' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'status_hubungan' => [
				'type' => 'enum',
				'constraint' => array('teman', 'keluarga', 'kolega'),
				'null' => true
			],
			'no_telepon' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'proyek_diminati' => [
				'type' => 'enum',
				'null' => true
			],
			'range_harga' => [
				'type' => 'double',
				'null' => true
			],
			'status_prospek' => [
				'type' => 'enum',
				'constraint' => array('closing', 'sp3k', 'akad', 'reject'),
				'null' => true
			],
			'keterangan' => [
				'type' => 'text',
				'constraint' => 100,
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
		$this->forge->addKey('id_prospek', true);
		$this->forge->createTable('prospek');
		$this->forge->addForeignKey('id_proyek', 'proyek', 'id_proyek');
	}

	public function down()
	{
		$this->forge->dropTable('prospek');
	}
}
