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
			'status_name' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
			'class' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => true
			],
			'role_scope' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true
			],
			'order' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_user_created' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_user_updated' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'id_user_deleted' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => false,
				'default' => 0
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			],
			'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			]
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('tbl_status');
	}

	public function down() {
		$this->forge->dropTable('tbl_status');
	}
}