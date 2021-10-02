<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubcategoriasMigrate extends Migration {
    public function up() {
        $this->db->disableForeignKeyChecks();
		
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
				'null' => false
			],
			'subcategoria' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
			'id_unidade' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
            'id_categoria' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
			'id_status' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
			'id_usuario_criado' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => false,
				'null' => false,
				'default' => 0
			],
			'id_usuario_atualizado' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => false,
				'null' => false,
				'default' => 0
			],
			'id_usuario_excluido' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => false,
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
		$this->forge->addForeignKey('id_unidade', 'tbl_unidades', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_categoria', 'tbl_unidades', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_status', 'tbl_status', 'id', 'CASCADE', 'NO_ACTION');
		$this->forge->createTable('tbl_subcategorias');

		$this->db->enableForeignKeyChecks();
    }

    public function down() {
        $this->forge->dropTable('tbl_subcategorias');
    }
}