<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuariosMigrate extends Migration {
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
            'avatar' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
            'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
			'sobrenome' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
            'genero' => [
				'type' => 'CHAR',
				'constraint' => '1',
				'null' => true
			],
            'email' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'unique' => true,
				'null' => true
			],
			'senha' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
				'null' => true
			],
            'id_permissao' => [
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
        $this->forge->addForeignKey('id_permissao', 'permissoes', 'id', 'CASCADE', 'NO_ACTION');
        $this->forge->addForeignKey('id_status', 'status', 'id', 'CASCADE', 'NO_ACTION');
		$this->forge->createTable('usuarios');

        $this->db->enableForeignKeyChecks();
    }

    public function down() {
        $this->forge->dropTable('usuarios');
    }
}