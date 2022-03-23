<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailProyek extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_detail' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_proyek' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'id_fasilitas' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
				'null' => true
			],
			'nama_proyek' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'pricelist' => [
				'type' => 'double',
				'null' => true
			],
			'estimasi_komisi' => [
				'type' => 'double',
				'null' => true
			],
			'video' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'brosur' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'foto' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'informasi_properti' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
				'null' => true
			],
			'deskripsi' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
				'null' => true
			],
			'lokasi_proyek' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'wisata_hiburan' => [
				'type' => 'VARCHAR',
				'constraint' => 1000,
				'null' => true
			]
		]);
		$this->forge->addKey('id_detail', true);
		$this->forge->createTable('detail_proyek');
		$this->forge->addForeignKey('id_proyek', 'proyek', 'id_proyek');
	}

	public function down()
	{
		$this->forge->dropTable('detail_proyek');
	}
}
