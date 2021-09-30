<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Status\StatusModel;

class StatusSeeder extends Seeder {
	public function run() {
		$statusModel = new StatusModel();

		$arrStatus = [];

		$arrStatus = [
			['status' => 'Ativo', 'classe' => 'green darken-2', 'escopo' => 'role.admin role.ti', 'ordenacao' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['status' => 'Inativo', 'classe' => 'amber darken-2', 'escopo' => 'role.admin role.ti', 'ordenacao' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
			['status' => 'Excluído', 'classe' => 'red darken-2', 'escopo' => 'role.admin role.ti', 'ordenacao' => 1, 'id_usuario_criado' => 1, 'id_usuario_atualizado' => 0, 'id_usuario_excluido' => 0, 'criado_em' => date('Y-m-d H:i:s'), 'atualizado_em' => date('0000-00-00 00:00:00'), 'excluido_em' => date('0000-00-00 00:00:00')],
		];

		foreach ($arrStatus as $value) {
			if (is_array($value)) {
				$inputs = [
					'status' => $value['status'],
					'classe' => $value['classe'],
					'escopo' => $value['escopo'],
					'ordenacao' => $value['ordenacao'],
					'id_usuario_criado' => $value['id_usuario_criado'],
					'id_usuario_atualizado' => $value['id_usuario_atualizado'],
					'id_usuario_excluido' => $value['id_usuario_excluido'],
					'criado_em' => $value['criado_em'],
					'atualizado_em' => $value['atualizado_em'],
					'excluido_em' => $value['excluido_em']
				];
			}

			$statusModel->save($inputs);
		}
	}
}