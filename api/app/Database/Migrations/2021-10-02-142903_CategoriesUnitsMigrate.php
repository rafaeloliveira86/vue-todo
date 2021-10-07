<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoriesUnitsMigrate extends Migration {
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
			'id_categorie' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
			'id_unit' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'null' => false,
				'default' => 0
			],
			'id_user_created' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => false,
				'null' => false,
				'default' => 0
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => false,
				'default' => date('0000-00-00 00:00:00')
			]
		]);

		$this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_categorie', 'tbl_categories', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('id_unit', 'tbl_units', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('tbl_categories_units');

		$this->db->enableForeignKeyChecks();
    }

    public function down() {
        $this->forge->dropTable('tbl_categories_units');
    }
}