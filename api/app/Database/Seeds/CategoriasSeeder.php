<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Categorias\CategoriasModel;

class CategoriasSeeder extends Seeder {
	public function run() {
		$categoriaModel = new CategoriasModel();

		$db = \CodeIgniter\Database\Config::connect();

		$arrCategoria = [];

		$arrCategoria = [
			['categoria' => 'Sistema UniMestre', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Sistema RM Totvs', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'RD Station', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Portal do Aluno', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Biblioteca', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'PIT', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Sistema CFM', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Sistema Escola Web', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'ClassApp', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['categoria' => 'Microsoft Teams', 'id_status' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],			
		];

		foreach ($arrCategoria as $value) {
			if (is_array($value)) {
				$inputs = [
					'categoria' => $value['categoria'],
					'id_status' => $value['id_status'],
					'id_usuario_criado' => $value['id_usuario_criado'],
					'id_usuario_atualizado' => $value['id_usuario_atualizado'],
					'id_usuario_excluido' => $value['id_usuario_excluido'],
					'criado_em' => $value['criado_em'],
					'atualizado_em' => $value['atualizado_em'],
					'excluido_em' => $value['excluido_em']
				];
			}

			$db->disableForeignKeyChecks();
			$categoriaModel->save($inputs);
			$db->enableForeignKeyChecks();
		}
	}
}