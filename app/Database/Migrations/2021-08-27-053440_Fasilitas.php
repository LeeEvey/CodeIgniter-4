<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Fasilitas extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_fasilitas' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'fasilitas' => [
				'type' => 'text',
				'constraint' => 1000,
				'null' => true
			],
			'fasilitas_kesehatan' => [
				'type' => 'text',
				'constraint' => 1000,
				'null' => true
			],
			'fasilitas_pendidikan' => [
				'type' => 'text',
				'constraint' => 1000,
				'null' => true
			],
			'fasilitas_komersil' => [
				'type' => 'text',
				'constraint' => 1000,
				'null' => true
			]
		]);
		$this->forge->addKey('id_fasilitas', true);
		$this->forge->createTable('fasilitas');
	}

	public function down()
	{
		$this->forge->dropTable('fasilitas');
	}
}
