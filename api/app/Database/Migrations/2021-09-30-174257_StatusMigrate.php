<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StatusMigrate extends Migration {
	public function up() {
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			],
			'status' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
			'classe' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true
			],
			'escopo' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true
			],
			'ordenacao' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_usuario_criado' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_usuario_atualizado' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_usuario_excluido' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'criado_em' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			],
			'atualizado_em' => [
				'type' => 'TIMESTAMP',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			],
			'excluido_em' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('status');
	}

	public function down() {
		$this->forge->dropTable('status');
	}
}