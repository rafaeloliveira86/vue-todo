<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriasUnidadesMigrate extends Migration {
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
			'id_categoria' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
			'id_unidade' => [
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
			'criado_em' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			]
		]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categoria', 'tbl_categorias', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_unidade', 'tbl_unidades', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tbl_categorias_unidades');

		$this->db->enableForeignKeyChecks();
    }

    public function down() {
        $this->forge->dropTable('tbl_categorias_unidades');
    }
}