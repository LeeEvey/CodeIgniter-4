<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_penjualan' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => true,
			],
			'id_pegawai' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
				'null' => true
			],
			'id_proyek' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'id_unit' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'tgl_transaksi' => [
				'type' => 'date',
				'null' => true
			],
			'tgl_batal' => [
				'type' => 'date',
				'null' => true
			],
			'due_date' => [
				'type' => 'date',
				'null' => true
			],
			'jenis_pembayaran' => [
				'type' => 'enum',
				'constraint' => array('tunai keras', 'tunai bertahap', 'kpr'),
				'null' => true
			],
			'status_penjualan' => [
				'type' => 'enum',
				'constraint' => array('booking', 'dp', 'sp3k', 'bank reject', 'sold'),
				'null' => true
			],
			'status_akad' => [
				'type' => 'tinyint',
				'constraint' => 11
			],
			'tgl_akad' => [
				'type' => 'date',
				'null' => true
			],
			'status_pencairan' => [
				'type' => 'tinyint',
				'constraint' => 11
			],
			'tgl_pencairan' => [
				'type' => 'date',
				'null' => true
			],
			'komisi_pencairan' => [
				'type' => 'double',
				'null' => true
			],
			'tgl_pengajuan' => [
				'type' => 'date',
				'null' => true
			],
			'tgl_proses' => [
				'type' => 'date',
				'null' => true
			],
			'pekerjaan_konsumen' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'nama_konsumen' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'nomor_konsumen' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'jk' => [
				'type' => 'enum',
				'constraint' => array('pria', 'wanita'),
				'null' => true
			],
			'no_ktp' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'alamat_konsumen' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'status_pernikahan' => [
				'type' => 'enum',
				'constraint' => array('lajang', 'menikah', 'duda', 'janda'),
				'null' => true
			],
			'nama_pasangaan' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'sumber_info' => [
				'type' => 'enum',
				'constraint' => array('facebook', 'instagram', 'website bos properti'),
				'null' => true
			],
			'metode_bayar' => [
				'type' => 'enum',
				'constraint' => array('single income', 'join income'),
				'null' => true
			],
			'diskon' => [
				'type' => 'double',
				'null' => true
			],
			'harga' => [
				'type' => 'double',
				'null' => true
			],
			'plafon_kpr' => [
				'type' => 'double',
				'null' => true
			],
			'harga_net' => [
				'type' => 'double',
				'null' => true
			],
			'booking_fee' => [
				'type' => 'double',
				'null' => true
			],
			'tgl_sp3k' => [
				'type' => 'date',
				'null' => true
			],
			'tgl_dp' => [
				'type' => 'date',
				'null' => true
			],
			'dp' => [
				'type' => 'double',
				'null' => true
			],
			'bukti_dp' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'hadiah_langsung' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'hadiah_snk' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'pic' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'colead' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => true
			],
			'transfer' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
				'null' => true
			],
			'bank' => [
				'type' => 'enum',
				'constraint' => array('btn', 'bri', 'maybank', 'niaga', 'hanabank', 'mandiri', 'bjb', 'bca', 'bni'),
				'null' => true
			],
			'keterangan' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			],
			'ket_pencairan' => [
				'type' => 'text',
				'constraint' => 100,
				'null' => true
			]
		]);
		$this->forge->addKey('id_penjualan', true);
		$this->forge->createTable('penjualan');
		$this->forge->addForeignKey('id_proyek', 'proyek', 'id_proyek');
	}

	public function down()
	{
		$this->forge->dropTable('penjualan');
	}
}
